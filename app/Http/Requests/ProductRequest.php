<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'is_promoted' => 'boolean',
            'promo_price' => 'nullable|integer|lt:price',
            'promo_start_at' => 'nullable|date',
            'promo_end_at' => 'nullable|date|after:promo_start_at',
            'promo_label' => 'nullable|string|max:50',
        ];
    }
}
