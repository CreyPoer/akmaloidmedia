<?php

namespace App\Http\Requests\Wallet;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'e_wallet' => 'required|string',
            'nama_rek' => 'required|string|max:50',
            'no_rek' => 'required|string|unique:wallets,no_rek',
            'gambar' => 'required|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
