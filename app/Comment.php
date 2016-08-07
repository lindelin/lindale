<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment.
 *
 * @property-read \App\Article $Article
 * @mixin \Eloquent
 *
 * @property int $id
 * @property string $nickname
 * @property string $email
 * @property string $website
 * @property string $content
 * @property int $article_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 */
class Comment extends Model
{
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    public function Article()
    {
        return $this->hasOne('App\Article', 'id', 'article_id');
    }
}
