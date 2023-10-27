<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(mixed $data)
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
}
