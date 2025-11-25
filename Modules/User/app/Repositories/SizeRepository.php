<?php

namespace Modules\User\Repositories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Model;

class SizeRepository extends BaseRepository
{
    protected function makeModel(): Model
    {
        return new Size();
    }

    /**
     * Get size by name
     */
    public function getSizeByName(string $sizeName): ?Model
    {
        return $this->query()
            ->where('size_name', $sizeName)
            ->first();
    }
}

