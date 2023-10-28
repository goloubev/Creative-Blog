<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $data)
 * @method static where(string $string, $category_id)
 * @property mixed $id
 */
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Force SQL table name
    protected $table = 'categories';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public static function getCategoryName($category_id): string
    {
        /*// SELECT title FROM categories WHERE id = 2;
        $result = Category::where('id', 2)->value('title');
        dd($result);

        // SELECT id, title FROM categories WHERE id = 2;
        $result = Category::where('id', 2)->select('id', 'title')->first();
        //dd($result);

        // SELECT * FROM categories WHERE title = "aaa";
        $result = Category::where('title', 'aaa')->get();
        dd($result);

        exit;*/

        $category = Category::where('id', $category_id)->first();

        return $category->title;
    }
}
