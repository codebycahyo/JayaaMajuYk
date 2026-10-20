<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->string('invoice_number')->unique();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->string('customer_name')->default('Pelanggan Umum');
                $table->integer('subtotal');
                $table->integer('discount')->default(0);
                $table->integer('tax')->default(0);
                $table->integer('total_amount');
                $table->integer('paid_amount');
                $table->integer('change_amount');
                $table->string('payment_method', 50)->default('cash');
                $table->string('status', 30)->default('completed');
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('transaction_items')) {
            Schema::create('transaction_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('transaction_id')->constrained('transactions')->cascadeOnDelete();
                $table->string('product_id');
                $table->string('product_name');
                $table->integer('price');
                $table->integer('qty');
                $table->integer('subtotal');
                $table->timestamps();

                $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
        Schema::dropIfExists('transactions');
    }
};
