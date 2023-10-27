<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'post_tags';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
