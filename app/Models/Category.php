<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $data)
 * @method static where(string $string, $category_id)
 * @property mixed $id
 */
class Category extends Model
{
    use HasFactory;
    //use SoftDeletes;

    // Force SQL table name
    protected $table = 'categories';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public static function getCategoryName($category_id): string
    {
        $category = Category::where('id', $category_id)->first();

        return $category->title;
    }

    public function posts(): HasMany
    {
        $result = $this->hasMany(
            Post::class,
            'category_id',
            'id'
        );
        return $result;
    }
}
