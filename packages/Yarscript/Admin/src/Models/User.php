<?php

namespace Yarscript\Admin\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package Yarscript\Admin\Models
 */
class User extends Authenticatable
{
    use Notifiable, HasFactory;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable   = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'email_verified_at',
        'phone_number_format',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @return UserFactory
     */
    protected static function newFactory(): UserFactory
    {
        return new UserFactory();
    }
}
