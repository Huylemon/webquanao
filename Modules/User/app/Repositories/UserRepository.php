<?php

namespace Modules\User\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new User();
    }

    /**
     * Find or create user by email and phone
     */
    public function findOrCreateByEmailAndPhone(array $identifiers, array $attributes): Model
    {
        return $this->query()->firstOrCreate($identifiers, $attributes);
    }
}

