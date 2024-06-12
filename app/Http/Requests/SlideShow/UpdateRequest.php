<?php

namespace App\Http\Requests\SlideShow;

use App\Rules\LandscapeImage;
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
        return [
            'judul' => 'required|string|max:30',
            'sub_judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'button' => 'required|string|max:20',
            'icon' => 'nullable|mimes:png|max:2048', // Jika foto disimpan sebagai URL atau path
            'gambar' => ['nullable', 'mimes:jpg,jpeg', 'max:2048', new LandscapeImage], // Jika foto disimpan sebagai URL atau path
        ];
    }
}
