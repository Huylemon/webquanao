<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $alias
 * @property string|null $description
 * @property string|null $detail
 * @property string|null $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'description',
        'detail',
        'image',
    ];
}

