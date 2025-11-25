<?php

namespace Modules\Admin\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Order();
    }

    /**
     * Get orders with customer paginated
     */
    public function getOrdersWithCustomerPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->query()
            ->with('customer')
            ->select('id', 'code', 'customer_name', 'customer_id', 'created_at', 'total_amount', 'status')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get order with details and customer
     */
    public function getOrderWithDetails(int $id): Model
    {
        return $this->query()
            ->with(['orderDetails.product', 'customer'])
            ->findOrFail($id);
    }

    /**
     * Get order with details for update
     */
    public function getOrderWithDetailsForUpdate(int $id): Model
    {
        return $this->query()
            ->with(['orderDetails.product'])
            ->findOrFail($id);
    }
}

