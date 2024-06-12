<?php

namespace App\Http\Requests\Paket;

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
            'kategori_produk_id' => 'required|exists:kategori_produks,id',
            'penerbit_id' => 'required|exists:penerbits,id',
            'periode_id' => 'required|exists:periodes,id',
            'name' => 'required|string|max:255',
            'gambar' => 'required|mimes:jpg,png,jpeg|max:2048', // Jika foto disimpan sebagai URL atau path
            'waktu_pengiriman' => 'required|in:Pagi,Siang,Sore',
            'harga_paket' => 'required|numeric',
            'deskripsi' => 'required|string'
        ];
    }
}
