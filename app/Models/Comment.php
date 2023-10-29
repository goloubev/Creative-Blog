<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Comment extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'comments';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
