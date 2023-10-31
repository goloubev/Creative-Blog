<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $id
 * @method static create(mixed $data)
 * @method static where(string $string, $user_id)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    //use SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // The attributes that should be hidden for serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getRoles(): array
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_READER => 'Reader',
        ];
    }

    public static function getRole($role_id): string
    {
        $roles = self::getRoles();

        return $roles[$role_id];
    }

    public static function getUserName($user_id)
    {
        $result = User::where('id', $user_id)->value('name');

        return $result;
    }

    // Override sending emails
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function likedPosts(): BelongsToMany
    {
        // belongsToMany : MANY to MANY
        // From USERS to POSTS
        // Table: user_post_likes
        // user_id -> post_id
        $result = $this->belongsToMany(
            Post::class,
            'user_post_likes',
            'user_id',
            'post_id'
        );
        return $result;
    }

    public function comments(): HasMany
    {
        // hasMany : ONE to MANY
        // From USERS to POSTS
        // Table: user_post_likes
        // user_id -> post_id
        $result = $this->hasMany(
            Comment::class,
            'user_id',
            'id'
        );
        return $result;
    }
}
