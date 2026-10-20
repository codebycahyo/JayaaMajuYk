<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductCrudTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'is_admin' => true,
        ]);

        $this->product = Product::create([
            'id' => 'test-printer-01',
            'name' => 'Test Printer POS',
            'category' => 'Printer Kasir',
            'price' => 1500000,
            'original_price' => 1800000,
            'stock' => 15,
            'description' => 'Printer testing description',
            'image' => 'assets/products/epson-tm-t82-iii.jpg',
            'specs' => ['Interface' => 'USB'],
        ]);
    }

    public function test_admin_can_access_edit_product_page(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.products.edit', $this->product->id));
        $response->assertStatus(200);
        $response->assertSee('Edit Produk');
        $response->assertSee('Test Printer POS');
    }

    public function test_admin_can_update_product(): void
    {
        $response = $this->actingAs($this->admin)->put(route('admin.products.update', $this->product->id), [
            'id' => $this->product->id,
            'name' => 'Updated Printer POS',
            'category' => 'Printer Kasir',
            'price' => 1650000,
            'original_price' => 1800000,
            'stock' => 20,
            'description' => 'Updated description for hardware printer',
            'specs_raw' => "Kecepatan=200mm/s\nKoneksi=USB",
            'image' => \Illuminate\Http\UploadedFile::fake()->image('new-printer.jpg'),
        ]);

        if ($response->getSession()->has('errors')) {
            dump($response->getSession()->get('errors')->all());
        }
        if ($response->getSession()->has('error')) {
            dump($response->getSession()->get('error'));
        }

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.products.index'));

        $this->assertEquals('Updated Printer POS', $this->product->fresh()->name);
        $this->assertEquals(1650000, $this->product->fresh()->price);
        $this->assertEquals(20, $this->product->fresh()->stock);
        $this->assertEquals(['Kecepatan' => '200mm/s', 'Koneksi' => 'USB'], $this->product->fresh()->specs);
        $this->assertStringContainsString('assets/products/', $this->product->fresh()->image);
    }

    public function test_admin_can_delete_product(): void
    {
        $response = $this->actingAs($this->admin)->delete(route('admin.products.delete', $this->product->id));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $this->product->id]);
    }

    public function test_delete_product_with_existing_transaction(): void
    {
        $tx = Transaction::create([
            'invoice_number' => 'INV-TEST-001',
            'customer_name' => 'John Doe',
            'subtotal' => 1500000,
            'total_amount' => 1500000,
            'paid_amount' => 1500000,
            'change_amount' => 0,
        ]);

        TransactionItem::create([
            'transaction_id' => $tx->id,
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'price' => $this->product->price,
            'qty' => 1,
            'subtotal' => $this->product->price,
        ]);

        $response = $this->actingAs($this->admin)->delete(route('admin.products.delete', $this->product->id));
        
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success');

        // Product is soft-deleted: not in default queries, but exists in withTrashed
        $this->assertNull(Product::find($this->product->id));
        $this->assertNotNull(Product::withTrashed()->find($this->product->id));
        $this->assertEquals(0, Product::withTrashed()->find($this->product->id)->stock);
    }

    public function test_deleted_product_does_not_appear_on_homepage(): void
    {
        $this->product->update(['is_best_seller' => true, 'stock' => 50]);
        $this->product->delete();

        $response = $this->get(route('home'));
        $response->assertOk();
        $response->assertDontSee($this->product->name);
    }
}
