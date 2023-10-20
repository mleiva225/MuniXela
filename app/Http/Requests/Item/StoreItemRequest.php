<?php

namespace App\Http\Requests\Item;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'code' => ['required', 'string', 'max:50', Rule::unique(Item::class)->ignore('code')],
            'series' => ['string', 'nullable'],
            'quantity' => ['numeric', 'nullable'],
            'sicoin_gl' => ['string', 'nullable'],
            'unit_value' => ['numeric', 'nullable'],
            'description' => ['string', 'nullable'],
            'observations' => ['string', 'nullable'],
        ];
    }
}
