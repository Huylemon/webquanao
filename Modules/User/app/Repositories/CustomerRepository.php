<?php

namespace Modules\User\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Customer();
    }

    /**
     * Find or create customer by email and phone
     */
    public function findOrCreateByEmailAndPhone(array $identifiers, array $attributes): Model
    {
        return $this->query()->firstOrCreate($identifiers, $attributes);
    }
}

