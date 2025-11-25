<?php

namespace Modules\User\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Order();
    }

    /**
     * Get orders by customer ID
     */
    public function getOrdersByCustomerId(int $customerId): Collection
    {
        return $this->query()
            ->with(['orderDetails.product'])
            ->where('customer_id', $customerId)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get order with details
     */
    public function getOrderWithDetails(int $id): Model
    {
        return $this->query()
            ->with(['orderDetails'])
            ->findOrFail($id);
    }

    /**
     * Update order status
     */
    public function updateStatus(int $id, string $status): bool
    {
        return $this->update($id, ['status' => $status]);
    }
}

