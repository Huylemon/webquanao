<?php

namespace Modules\User\Repositories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class OrderDetailRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new OrderDetail();
    }

    /**
     * Create order detail
     */
    public function createOrderDetail(array $data): Model
    {
        return $this->create($data);
    }
}

