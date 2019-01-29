<?php

namespace App\Wiki;

use App\Project\Project;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Wiki\Wiki.
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property int $user_id
 * @property int $project_id
 * @property int $type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Wiki\WikiType $Type
 * @property-read \App\User $User
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\Wiki whereUserId($value)
 * @mixin \Eloquent
 */
class Wiki extends Model
{
    /**
     * 一篇WIKI只有一个作者
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一篇WIKI只有一个索引
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne('App\Wiki\WikiType', 'id', 'type_id');
    }

    /**
     * Project
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * Typeフィルター
     * @param $query
     * @param WikiType $type
     */
    public function scopeTypeFilter($query, WikiType $type)
    {
        if ($type->id === 1) {
            $query->where('type_id', $type->id)->orWhere('type_id', 0);
        } else {
            $query->where('type_id', $type->id);
        }
    }
}
