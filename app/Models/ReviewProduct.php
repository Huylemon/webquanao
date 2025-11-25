<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $product_id
 * @property string $user_name
 * @property string $full_name
 * @property string|null $content
 * @property int $rate
 * @property int|null $order_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Order|null $order
 */
class ReviewProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_name',
        'full_name',
        'content',
        'rate',
        'order_id',
    ];

    protected $casts = [
        'rate' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}

