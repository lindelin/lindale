<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    /**
     * 有効
     * @param $query
     */
    public function scopeValid($query)
    {
        $query->where('revoked', false);
    }

    /**
     * Device Tokens 取得
     * @param Collection $users
     * @return Collection $users
     */
    public static function tokens(Collection $users): Collection
    {
        return static::whereIn('user_id', $users->pluck('id')->toArray())
            ->where('revoked', false)
            ->get()
            ->pluck('token');
    }
}
