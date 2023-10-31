<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $data)
 * @method static firstOrCreate($data)
 * @method static paginate(int $int)
 * @method static get()
 * @method static withCount(string $string)
 * @method static where(string $string, mixed $category_id)
 * @property mixed $id
 * @property mixed $preview_image
 * @property mixed $main_image
 * @property mixed $created_at
 * @property mixed $comments
 * @property mixed $category_id
 */
class Post extends Model
{
    use HasFactory;
    //use SoftDeletes;

    // Force SQL table name
    protected $table = 'posts';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    protected $withCount = ['likedUsers'];

    public function tags(): BelongsToMany
    {
        // MANY to MANY
        // From POSTS to TAGS
        // Table: post_tags
        // post_id -> tag_id
        $result = $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
        return $result;
    }

    public function category(): BelongsTo
    {
        // ONE to MANY
        $result = $this->belongsTo(
            Category::class,
            'category_id',
            'id'
        );
        return $result;
    }

    public function likedUsers(): BelongsToMany
    {
        // MANY to MANY
        $result = $this->belongsToMany(
            User::class,
            'user_post_likes',
            'post_id',
            'user_id'
        );
        return $result;
    }

    public function comments(): HasMany
    {
        $result = $this->hasMany(
            Comment::class,
            'post_id',
            'id'
        );
        return $result;
    }

}
