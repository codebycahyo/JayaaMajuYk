<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'category',
        'price',
        'original_price',
        'stock',
        'description',
        'image',
        'images',
        'tags',
        'is_ready_stock',
        'is_best_seller',
        'specs',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'original_price' => 'integer',
            'stock' => 'integer',
            'images' => 'array',
            'tags' => 'array',
            'specs' => 'array',
            'is_ready_stock' => 'boolean',
            'is_best_seller' => 'boolean',
        ];
    }

    public function transactionItems(): HasMany
    {
        return $this->hasMany(TransactionItem::class, 'product_id', 'id');
    }
}
