<?php

namespace Modules\User\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Category();
    }

    /**
     * Get category by gender
     */
    public function getCategoryByGender(string $gender): ?Model
    {
        return $this->query()
            ->where('gender', $gender)
            ->first();
    }
}

