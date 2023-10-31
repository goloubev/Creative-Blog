<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 * @property mixed $created_at
 * @method static create(mixed $data)
 */
class Comment extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'comments';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    public function user(): BelongsTo
    {
        // ONE to MANY
        $result = $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
        return $result;
    }

    // GETTER: get...Attribute()
    // CALL : $comment->createdDateAsCarbon
    public function getCreatedDateAsCarbonAttribute(): string
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
