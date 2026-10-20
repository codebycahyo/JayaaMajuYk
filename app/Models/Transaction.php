<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    protected $fillable = [
        'invoice_number',
        'type', // 'pos' atau 'online'
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'shipping_courier',
        'shipping_cost',
        'subtotal',
        'discount',
        'tax',
        'total_amount',
        'paid_amount',
        'change_amount',
        'payment_method',
        'payment_status', // 'paid' atau 'unpaid'
        'order_status',   // 'pending', 'processing', 'completed', 'cancelled'
        'status',         // backward compatibility alias
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'integer',
            'discount' => 'integer',
            'tax' => 'integer',
            'shipping_cost' => 'integer',
            'total_amount' => 'integer',
            'paid_amount' => 'integer',
            'change_amount' => 'integer',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id');
    }

    public function cashier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isOnline(): bool
    {
        return $this->type === 'online';
    }

    public function isPos(): bool
    {
        return $this->type === 'pos';
    }

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        if (!empty($filters['start_date'])) {
            $query->whereDate('created_at', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->whereDate('created_at', '<=', $filters['end_date']);
        }

        if (!empty($filters['type']) && $filters['type'] !== 'all') {
            $query->where('type', $filters['type']);
        }

        if (!empty($filters['payment_method']) && $filters['payment_method'] !== 'all') {
            $query->where('payment_method', $filters['payment_method']);
        }

        if (!empty($filters['payment_status']) && $filters['payment_status'] !== 'all') {
            $query->where('payment_status', $filters['payment_status']);
        }

        if (!empty($filters['order_status']) && $filters['order_status'] !== 'all') {
            $query->where('order_status', $filters['order_status']);
        }

        if (!empty($filters['status']) && $filters['status'] !== 'all') {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%");
            });
        }

        return $query;
    }
}
