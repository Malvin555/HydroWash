<?php

namespace App\Http\Requests;

use App\Rules\ValidTotalPrice;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void 
    {
        if ($this->is('user/iron') || $this->is('user/laundry')) {
            $this->merge([
                'serviceType' => $this->is('user/iron') ? 'ironing' : 'laundry',
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|exists:item_types,name_item',
            'amount' => 'required|integer|min:1',
            'price-total' => ['required', new ValidTotalPrice(
                itemName: $this->input('type'),
                itemAmount: $this->input('amount'),
                serviceType: $this->input('serviceType'),
            )],
            'retrieval-method' => 'required|in:delivery,take_away',
            'address' => 'required_if:retrieval-method,delivery',
            'destination' => 'required_if:retrieval-method,delivery',
            'note' => 'nullable',
        ];
    }
}
