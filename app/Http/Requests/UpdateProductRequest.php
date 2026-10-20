<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && (auth()->user()->isAdmin());
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:0'],
            'original_price' => ['nullable', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string', 'max:5000'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'specs_raw' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'category.required' => 'Kategori produk wajib dipilih.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.integer' => 'Harga produk harus berupa angka bulat.',
            'price.min' => 'Harga produk tidak boleh bernilai negatif.',
            'original_price.integer' => 'Harga coret harus berupa angka bulat.',
            'original_price.min' => 'Harga coret tidak boleh bernilai negatif.',
            'stock.required' => 'Jumlah stok produk wajib diisi.',
            'stock.integer' => 'Jumlah stok harus berupa bilangan bulat.',
            'stock.min' => 'Jumlah stok tidak boleh bernilai negatif.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar valid.',
            'image.mimes' => 'Format gambar yang didukung adalah JPEG, PNG, JPG, atau WebP.',
            'image.max' => 'Ukuran gambar maksimal adalah 2 MB.',
        ];
    }
}
