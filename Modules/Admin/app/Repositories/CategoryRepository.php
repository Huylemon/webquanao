<?php

namespace Modules\Admin\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Category();
    }
}

