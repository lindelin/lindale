<?php

namespace App\Tools\Authenticates;

use App\Mail\InviteMail;
use App\User;
use Mail;
use Illuminate\Database\Eloquent\Model;

class AuthToken extends Model
{
    protected $fillable = [
        'user_id', 'token'
    ];

    /**
     * ルートキー
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }

    /**
     * ユーザのトークンを生成
     * @param User $user
     * @return $this|Model
     */
    public static function generateFor(User $user)
    {
        return static::create([
            'user_id' => $user->id,
            'token' => str_random(50),
        ]);
    }

    /**
     * トークンで探す
     * @param $token
     * @return Model|null|static
     */
    public static function findByToken($token)
    {
        return static::where('token', $token)->first();
    }

    /**
     * メール送信
     */
    public function send()
    {
        Mail::to($this->user->email)->send(new InviteMail($this, request()->user()));
    }

    /**
     * ユーザ
     * 1対1
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
