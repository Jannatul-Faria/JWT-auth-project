<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'mobile',
        'password',
        'otp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        // 'password',
        // 'otp',

    ];

    // protected attribute:
    protected $attributes = [
        'otp' => '0'
    ];
}
