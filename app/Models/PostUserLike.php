<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'user_post_likes';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
