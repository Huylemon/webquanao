<?php

namespace Modules\Admin\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Find or create customer by email
     */
    public function findOrCreateByEmail(array $identifiers, array $attributes): Model
    {
        return $this->query()->firstOrCreate($identifiers, $attributes);
    }
}


