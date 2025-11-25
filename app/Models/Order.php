<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

    /**
     * @property int $id
     * @property string $code
     * @property string $customer_name
     * @property string $phone
     * @property string $address
     * @property int $total_amount
     * @property int $quantity
     * @property string|null $type_payment
     * @property string|null $email
     * @property string $status
     * @property int|null $customer_id
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property-read \App\Models\Customer|null $customer
     * @property-read \App\Models\User|null $user
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderDetail[] $orderDetails
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReviewProduct[] $reviewProducts
     */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'customer_name',
        'phone',
        'address',
        'total_amount',
        'quantity',
        'type_payment',
        'email',
        'status',
        'customer_id',
    ];

    protected $casts = [
        'total_amount' => 'integer',
        'quantity' => 'integer',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function reviewProducts(): HasMany
    {
        return $this->hasMany(ReviewProduct::class, 'order_id');
    }
}

