<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'revoked' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token',
        'name',
        'type',
        'user_id',
        "revoked",
    ];
}
