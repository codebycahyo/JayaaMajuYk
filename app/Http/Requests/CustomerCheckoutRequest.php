<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Terbuka untuk seluruh pelanggan publik
    }

    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'max:100'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_address' => ['required', 'string', 'max:500'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:10'],
            'notes' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Nama penerima pesanan wajib diisi.',
            'customer_phone.required' => 'Nomor WhatsApp aktif wajib diisi untuk konfirmasi pesanan.',
            'customer_address.required' => 'Alamat lengkap pengiriman wajib diisi.',
            'city.required' => 'Kota / Kabupaten wajib diisi.',
        ];
    }
}
