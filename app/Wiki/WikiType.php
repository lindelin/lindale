<?php

namespace App\Wiki;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Wiki\WikiType
 *
 * @property int $id
 * @property string $name
 * @property int $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Wiki\Wiki[] $Wikis
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\WikiType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\WikiType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\WikiType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\WikiType whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Wiki\WikiType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WikiType extends Model
{
    /**
     * 一个索引有多篇WIKI.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Wikis()
    {
        return $this->hasMany('App\Wiki\Wiki', 'type_id', 'id');
    }
}
