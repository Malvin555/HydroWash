<?php

namespace App;

use App\Models\Canceled;
use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\ItemType;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

trait HandleServiceValidation
{
    protected $isAdmin = false;
    protected $modalId = '';
    protected $serviceType = '';

    public function setValidationBehavior(bool $isAdmin, string $modalId)
    {
        $this->isAdmin = $isAdmin;
        $this->modalId = $modalId;
        return $this;
    }

    public function setServiceType(string $serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    public function validateServiceData(array $data, ?int $id = null): array|RedirectResponse
    {
        $validator = Validator::make($data, [
            'amounts' => 'required|array',
            'selected_types' => 'required|array',
            'selected_types.*' => 'required|exists:item_types,name_item',
            'retrieval-method' => 'required|in:delivery,take_away',
            'address' => 'required_if:retrieval-method,delivery',
            'destination' => 'required_if:retrieval-method,delivery',
            'notes' => 'nullable',
            'status' => $id ? 'required|in:pending,process,completed' : 'sometimes|nullable',
            'estimation' => $id ? 'nullable|date' : 'sometimes|nullable',
            'status-report' => $id ? 'required|in:normal,deleted' : 'sometimes|nullable',
        ]);

        if ($validator->fails()) {
            return $this->handleFailedValidation($validator->errors());
        }

        $validatedData = $validator->validated();

        $validatedData['item-quantities'] = $this->mapItemQuantities($data);
        $validatedData['amount-total'] = $this->calculatedTotalAmount($validatedData['item-quantities']);
        $validatedData['price-total'] = $this->calculatedTotalPrice($data, $id);

        return $validatedData;
    }

    protected function handleFailedValidation($validator): RedirectResponse
    {
        $redirect = redirect()->back()->withErrors($validator)->withInput();

        if ($this->isAdmin && $this->modalId) {
            $redirect->with('show_modal', $this->modalId);
        }

        return $redirect;
    }

    protected function calculatedTotalPrice(array $data, ?int $id = null): string
    {
        $additionalPrice = 20000;
        $tax = 0.1;
        $calculatedPrice = 0;
        $selectedTypes = array_map('ucfirst', $data['selected_types']);
        $amounts = $data['amounts'];

        $items = ItemType::whereIn('name_item', $selectedTypes)
            ->where('role', $this->serviceType)
            ->get(['name_item', 'price_item']);

        foreach ($items as $item) {
            $qty = $amounts[lcfirst($item['name_item'])];
            $calculatedPrice += $item->price_item * $qty;
        }

        if ($id) {
            $existingData = $this->serviceType === 'ironing' ? Ironing::find($id) : Laundry::find($id);
            $price =  $this->serviceType === 'ironing' ? $existingData->price_ironing : $existingData->price_laundry;

            if ($existingData->retrieval_method === $data['retrieval-method']) {
                $calculatedPrice = $price;
            } else {
                $calculatedPrice = match ($data['retrieval-method']) {
                    'delivery' => $price + $additionalPrice + ($price * $tax),
                    'take_away' => $price - $additionalPrice,
                    default => $calculatedPrice,
                };
            }
        } else {
            $calculatedPrice += $data['retrieval-method'] === 'delivery' ? $additionalPrice + ($calculatedPrice * $tax) : 0;
        }

        return 'Rp ' . number_format($calculatedPrice, 2, ',', '.');
    }

    protected function mapItemQuantities(array $data): Collection
    {
        $selectedTypes = $data['selected_types'];
        $amounts = $data['amounts'];

        $amountTotal = collect($selectedTypes)
            ->mapWithKeys(function ($type) use ($amounts) {
                return [$type => $amounts[$type]];
            });

        return $amountTotal;
    }

    protected function calculatedTotalAmount(Collection $selectedAmounts): int
    {
        return $selectedAmounts->reduce(function ($carry, $amount) {
            return $carry += $amount;
        }, 0);
    }

    public function saveOrderItemsData($model, array $data)
    {
        if (!$model instanceof Laundry && !$model instanceof Ironing) {
            abort(400, 'The model must be an instance of Laundry or Ironing.');
        }

        foreach ($data['item-quantities']->toArray() as $itemName => $quantity) {
            $item = ItemType::where('name_item', $itemName)
                ->where('role', $this->serviceType)
                ->first();

            if (!$item) {
                continue;
            }

            $orderItem = $model->orderItems()
                ->where('item_id', $item->id)
                ->first() ?? new OrderItems();

            $orderItem->fill([
                'item_id' => $item->id,
                'quantity' => $quantity,
                'price_total' => $item->price_item * $quantity,
                'created_who' => $orderItem->created_who ?? Auth::user()?->name,
            ]);

            $model->orderItems()->save($orderItem);
        }
    }

    public function saveIroningData(array $data, ?int $id = null): Ironing
    {
        $ironing = $id ? Ironing::find($id) : new Ironing();

        $ironing->fill([
            'user_id' => $ironing->user_id ?? Auth::id(),
            'name_ironing' => $ironing->name_ironing ?? Str::generateRandomString('Ironing'),
            'price_ironing' => Str::rupiahToFloat($data['price-total']),
            'amount_item' => $data['amount-total'],
            'retrieval_method' => $data['retrieval-method'],
            'status_transaction' => $data['status-transaction'] ?? 'uncompleted',
            'address_taking' => $data['retrieval-method'] === 'delivery' ? $data['address'] : null,
            'address_delivery' => $data['retrieval-method'] === 'delivery' ? $data['destination'] : null,
            'status' => $data['status'] ?? 'pending',
            'notes_ironing' => $data['notes'] ?? null,
            'estimation' => $data['estimation'] ?? null,
            'status_report' => $data['status-report'] ?? 'normal',
            'created_who' => $ironing->created_who ?? Auth::user()?->name,
        ]);

        if (array_key_exists('status-report', $data)) {
            if ($data['status-report'] === 'normal' && $ironing->canceled()->exists()) {
                $ironing->canceled()->delete();
            } elseif ($data['status-report'] === 'deleted') {
                Canceled::create([
                    'user_id' => Auth::id(),
                    'ironing_id' => $ironing->id,
                    'issues' => 'Canceled by Admin',
                    'created_who' => Auth::user()?->name,
                ]);
            }
        }

        $ironing->save();
        
        $this->saveOrderItemsData($ironing, $data);
        return $ironing;
    }

    public function saveLaundryData(array $data, ?int $id = null): Laundry
    {
        $laundry = $id ? Laundry::find($id) : new Laundry();

        $laundry->fill([
            'user_id' => $laundry->user_id ?? Auth::id(),
            'name_laundry' => $laundry->name_laundry ?? Str::generateRandomString('Laundry'),
            'price_laundry' => Str::rupiahToFloat($data['price-total']),
            'amount_item' => $data['amount-total'],
            'retrieval_method' => $data['retrieval-method'],
            'status_transaction' => $data['status-transaction'] ?? 'uncompleted',
            'address_taking' => $data['retrieval-method'] === 'delivery' ? $data['address'] : null,
            'address_delivery' => $data['retrieval-method'] === 'delivery' ? $data['destination'] : null,
            'status' => $data['status'] ?? 'pending',
            'notes_laundry' => $data['notes'] ?? null,
            'estimation' => $data['estimation'] ?? null,
            'status_report' => $data['status-report'] ?? 'normal',
            'created_who' => $laundry->created_who ?? Auth::user()?->name,
        ]);

        if (array_key_exists('status-report', $data)) {
            if ($data['status-report'] === 'normal' && $laundry->canceled()->exists()) {
                $laundry->canceled()->delete();
            } elseif ($data['status-report'] === 'deleted') {
                Canceled::create([
                    'user_id' => Auth::id(),
                    'laundry_id' => $laundry->id,
                    'issues' => 'Canceled by Admin',
                    'created_who' => Auth::user()?->name,
                ]);
            }
        }

        $laundry->save();

        $this->saveOrderItemsData($laundry, $data);
        return $laundry;
    }
}
