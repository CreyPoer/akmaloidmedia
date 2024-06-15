<?php

namespace App\Http\Requests\Wallet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $walletId = $this->route('id');
        return [
            'e_wallet' => 'nullable|string',
            'nama_rek' => 'nullable|string|max:50',
            'no_rek' => 'nullable|string|unique:wallets,no_rek,' . $walletId,
            'gambar' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
