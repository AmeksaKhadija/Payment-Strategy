<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'method' => 'required|string|in:stripe,paypal,cmi',
            'amount' => 'required|numeric|min:0.01',
        ];
    }

    public function messages()
    {
        return [
            'method.required' => 'Payment method is required.',
            'method.string' => 'Payment method must be a string.',
            'method.in' => 'Payment method must be one of the following: stripe, paypal, cmi.',
            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a numeric value.',
            'amount.min' => 'Amount must be at least 0.01.',
        ];
    }
}
