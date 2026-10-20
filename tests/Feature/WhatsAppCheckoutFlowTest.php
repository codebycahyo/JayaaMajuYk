<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WhatsAppCheckoutFlowTest extends TestCase
{
    use RefreshDatabase;

    private function createSampleProduct(): Product
    {
        return Product::create([
            'id' => 'PRD-TEST-001',
            'name' => 'Printer Thermal Test 80mm',
            'category' => 'Printer Thermal',
            'price' => 750000,
            'cost_price' => 500000,
            'stock' => 10,
            'min_stock' => 2,
            'image' => 'assets/products/printer-thermal-80mm.jpg',
            'description' => 'Test thermal printer',
            'specs' => ['Interface' => 'USB + Bluetooth'],
        ]);
    }

    public function test_buy_via_wa_redirects_to_checkout(): void
    {
        $product = $this->createSampleProduct();

        $response = $this->post(route('cart.add'), [
            'id' => $product->id,
            'qty' => 1,
            'buy_now' => 1,
        ]);

        $response->assertRedirect(route('checkout'));
    }

    public function test_checkout_form_submission_creates_order_and_redirects_to_success(): void
    {
        $product = $this->createSampleProduct();

        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'qty' => 1,
                'price' => $product->price,
                'image' => $product->image,
                'stock' => $product->stock,
            ],
        ];

        $initialStock = $product->fresh()->stock;

        $response = $this->withSession(['cart' => $cart])->post(route('checkout.store'), [
            'customer_name' => 'Budi Santoso',
            'customer_phone' => '081298765432',
            'customer_address' => 'Jl. Kaliurang KM 5',
            'city' => 'Sleman',
            'province' => 'D.I. Yogyakarta',
            'notes' => 'Tolong dicek sebelum kirim',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        // Stock decreased
        $this->assertEquals($initialStock - 1, $product->fresh()->stock);

        // Check success page
        $targetUrl = $response->headers->get('Location');
        $successResponse = $this->get($targetUrl);

        $successResponse->assertStatus(200);
        $successResponse->assertSee('Menghubungkan ke WhatsApp...');
        $successResponse->assertSee('Budi Santoso');
        $successResponse->assertSee('window.location.href = waUrl', false);
        $successResponse->assertSee('BUKA WHATSAPP SEKARANG');
        $successResponse->assertSee('https://wa.me/6281234567890', false);
    }
}
