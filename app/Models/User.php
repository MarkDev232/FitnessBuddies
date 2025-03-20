<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes; // ✅ Added SoftDeletes for safe deletions

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture', // ✅ Added Profile Picture field
        'phone',           // ✅ Added Phone field
        'address',         // ✅ Added Address field
        'role',            // ✅ Added Role field (admin, customer, trainer)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'string', // ✅ Change to string to prevent auto-hashing
    ];

    /**
     * Automatically include soft-deleted users in queries.
     */
    protected static function booted()
    {
        static::addGlobalScope('includeDeleted', function (Builder $builder) {
            $builder->withTrashed(); // ✅ Automatically includes soft-deleted users in all queries
        });
    }

    /**
     * Accessor for profile picture URL.
     */
    protected function profilePicture(): Attribute
    {
        return Attribute::get(function ($value) {
            return $value ? asset('storage/' . $value) : asset('images/default-profile.png');
        });
    }

    /**
     * Restore a soft-deleted user.
     */
    public function restoreUser()
    {
        return $this->restore(); // ✅ Restores a soft-deleted user
    }

    /**
     * Permanently delete a user.
     */
    public function forceDeleteUser()
    {
        return $this->forceDelete(); // ✅ Permanently deletes a user
    }
}
