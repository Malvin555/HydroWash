<?php

namespace App;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\ItemType;
use Illuminate\Support\Str;
use App\Rules\ValidTotalPrice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

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
        $errors = [];

        if (empty($data['type'])) {
            $errors['type'] = 'The type field is required.';
        }

        if (empty($data['amount'])) {
            $errors['amount'] = 'The amount field is required.';
        }

        if (!empty($errors)) {
            return $this->handleFailedValidation($errors);
        }

        $validator = Validator::make($data, [
            'type' => 'required|exists:item_types,name_item',
            'amount' => 'required|integer|min:1',
            'price-total' => ['required', new ValidTotalPrice(
                itemName: $data['type'],
                itemAmount: $data['amount'],
                serviceType: $this->serviceType,
            )],
            'retrieval-method' => 'required|in:delivery,take_away',
            'address' => 'required_if:retrieval-method,delivery',
            'destination' => 'required_if:retrieval-method,delivery',
            'note' => 'nullable',
            'status' => $id ? 'required|in:pending,process,completed' : 'sometimes|nullable',
            'estimation' => $id ? 'nullable|date' : 'sometimes|nullable',
            'status-report' => $id ? 'required|in:normal,deledted' : 'sometimes|nullable',
        ]);

        if ($validator->fails()) {
            return $this->handleFailedValidation($validator->errors());
        }

        return $validator->validated();
    }

    protected function handleFailedValidation($validator): RedirectResponse
    {
        $redirect = redirect()->back()->withErrors($validator)->withInput();

        if ($this->isAdmin && $this->modalId) {
            $redirect->with('show_modal', $this->modalId);
        }

        return $redirect;
    }

    public function saveIroningData(array $data, ?int $id = null): Ironing
    {
        $ironing = $id ? Ironing::find($id) : new Ironing();

        $ironing->fill([
            'user_id' => $ironing->user_id ?? Auth::id(),
            'item_id' => ItemType::where('name_item', $data['type'])->where('role', 'ironing')->value('id'),
            'name_ironing' => $ironing->name_ironing ?? Str::generateRandomString('Ironing'),
            'price_ironing' => Str::rupiahToFloat($data['price-total']),
            'amount_item' => $data['amount'],
            'retrieval_method' => $data['retrieval-method'],
            'status_transaction' => $data['status-transaction'] ?? 'uncompleted',
            'status_report' => 'normal',
            'address_taking' => $data['retrieval-method'] === 'delivery' ? $data['address'] : null,
            'address_delivery' => $data['retrieval-method'] === 'delivery' ? $data['destination'] : null,
            'status' => $data['status'] ?? 'pending',
            'notes_ironing' => $data['note'] ?? null,
            'estimation' => $data['estimation'] ?? null,
            'status_report' => $data['status-report'] ?? 'normal',
            'created_who' => $ironing->created_who ?? Auth::user()?->name,
        ]);

        if (array_key_exists('status-report', $data) && $data['status-report'] === 'normal') {
            $ironing->canceled()->exists() ? $ironing->canceled()->delete() : null;
        }

        $ironing->save();

        return $ironing;
    }

    public function saveLaundryData(array $data, ?int $id = null): Laundry
    {
        $laundry = $id ? Laundry::find($id) : new Laundry();

        $laundry->fill([
            'user_id' => $laundry->user_id ?? Auth::id(),
            'item_id' => ItemType::where('name_item', $data['type'])->where('role', 'laundry')->value('id'),
            'name_laundry' => $laundry->name_laundry ?? Str::generateRandomString('Laundry'),
            'price_laundry' => Str::rupiahToFloat($data['price-total']),
            'amount_item' => $data['amount'],
            'retrieval_method' => $data['retrieval-method'],
            'status_transaction' => $data['status-transaction'] ?? 'uncompleted',
            'status_report' => 'normal',
            'address_taking' => $data['retrieval-method'] === 'delivery' ? $data['address'] : null,
            'address_delivery' => $data['retrieval-method'] === 'delivery' ? $data['destination'] : null,
            'status' => $data['status'] ?? 'pending',
            'notes_laundry' => $data['note'] ?? null,
            'estimation' => $data['estimation'] ?? null,
            'status_report' => $data['status-report'] ?? 'normal',
            'created_who' => $laundry->created_who ?? Auth::user()?->name,
        ]);

        if (array_key_exists('status-report', $data) && $data['status-report'] === 'normal') {
            $laundry->canceled()->exists() ? $laundry->canceled()->delete() : null;
        }

        $laundry->save();

        return $laundry;
    }
}
