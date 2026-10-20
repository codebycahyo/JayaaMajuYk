<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'customer_name' => ['nullable', 'string', 'max:100'],
            'discount' => ['nullable', 'integer', 'min:0'],
            'paid_amount' => ['required', 'integer', 'min:0'],
            'payment_method' => ['required', 'string', 'in:cash,qris,transfer,debit'],
            'notes' => ['nullable', 'string', 'max:500'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.id' => ['required', 'string', 'exists:products,id'],
            'items.*.qty' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'items.required' => 'Keranjang transaksi kasir tidak boleh kosong.',
            'items.min' => 'Minimal harus ada 1 produk dalam transaksi.',
            'paid_amount.required' => 'Jumlah uang yang dibayarkan wajib diisi.',
            'paid_amount.integer' => 'Nominal uang pembayaran harus berupa angka bulat.',
            'paid_amount.min' => 'Nominal uang pembayaran tidak boleh negatif.',
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            'payment_method.in' => 'Metode pembayaran tidak valid.',
        ];
    }
}
