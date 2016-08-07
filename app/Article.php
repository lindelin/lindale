<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $Comments
 * @property-read \App\User $User
 * @mixin \Eloquent
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 */
class Article extends Model
{
    public function Comments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
