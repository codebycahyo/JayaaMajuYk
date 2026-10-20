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
        Schema::table('transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('transactions', 'type')) {
                $table->string('type', 20)->default('pos')->after('invoice_number');
            }
            if (!Schema::hasColumn('transactions', 'customer_phone')) {
                $table->string('customer_phone', 30)->nullable()->after('customer_name');
            }
            if (!Schema::hasColumn('transactions', 'customer_address')) {
                $table->text('customer_address')->nullable()->after('customer_phone');
            }
            if (!Schema::hasColumn('transactions', 'shipping_courier')) {
                $table->string('shipping_courier', 50)->nullable()->after('customer_address');
            }
            if (!Schema::hasColumn('transactions', 'shipping_cost')) {
                $table->integer('shipping_cost')->default(0)->after('shipping_courier');
            }
            if (!Schema::hasColumn('transactions', 'payment_status')) {
                $table->string('payment_status', 30)->default('paid')->after('payment_method');
            }
            if (!Schema::hasColumn('transactions', 'order_status')) {
                $table->string('order_status', 30)->default('completed')->after('payment_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'type',
                'customer_phone',
                'customer_address',
                'shipping_courier',
                'shipping_cost',
                'payment_status',
                'order_status',
            ]);
        });
    }
};
