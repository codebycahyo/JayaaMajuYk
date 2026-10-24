<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && (auth()->user()->isAdmin());
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'alpha_dash', 'max:50', 'unique:products,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:0'],
            'original_price' => ['nullable', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string', 'max:5000'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'image_url' => ['nullable', 'url', 'max:1000'],
            'specs_raw' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if (!$this->hasFile('image') && empty($this->input('image_url'))) {
                $validator->errors()->add('image', 'Silakan unggah file gambar produk ATAU masukkan tautan URL gambar.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'id.required' => 'ID Produk wajib diisi.',
            'id.alpha_dash' => 'ID Produk hanya boleh berisi huruf, angka, strip (-), dan garis bawah (_).',
            'id.unique' => 'ID Produk sudah digunakan oleh produk lain.',
            'name.required' => 'Nama produk wajib diisi.',
            'category.required' => 'Kategori produk wajib dipilih.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.integer' => 'Harga produk harus berupa angka bulat.',
            'price.min' => 'Harga produk tidak boleh bernilai negatif.',
            'original_price.integer' => 'Harga coret harus berupa angka bulat.',
            'original_price.min' => 'Harga coret tidak boleh bernilai negatif.',
            'stock.required' => 'Jumlah stok awal produk wajib diisi.',
            'stock.integer' => 'Jumlah stok harus berupa bilangan bulat.',
            'stock.min' => 'Jumlah stok tidak boleh bernilai negatif.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'image.required' => 'File gambar produk wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar valid.',
            'image.mimes' => 'Format gambar yang didukung adalah JPEG, PNG, JPG, atau WebP.',
            'image.max' => 'Ukuran gambar maksimal adalah 2 MB.',
        ];
    }
}
