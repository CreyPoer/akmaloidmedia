<?php

namespace App\Http\Requests\UserManagement;

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
            'name' => 'required|string|max:255',
            'no_telepon' => 'required|string|unique:users,no_telepon|max:15',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'foto' => 'required|mimes:jpg,png,jpeg|max:2048', // Jika foto disimpan sebagai URL atau path
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8', // Sesuaikan dengan kebijakan password Anda
            'role' => 'required|in:admin,pelanggan',
        ];
    }
}
