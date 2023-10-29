<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $data)
 * @method static firstOrCreate($data)
 * @property mixed $id
 * @property mixed $preview_image
 * @property mixed $main_image
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Force SQL table name
    protected $table = 'posts';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public function tags(): BelongsToMany
    {
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
}
