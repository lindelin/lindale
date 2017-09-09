<?php

namespace App\Notice;

use App\User;
use App\Project\Project;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Notice\Notice
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon|null $start_at
 * @property \Carbon\Carbon|null $end_at
 * @property int $project_id
 * @property int $user_id
 * @property int $type_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Project\Project $Project
 * @property-read \App\Notice\NoticeType $Type
 * @property-read \App\User $User
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\Notice whereUserId($value)
 * @mixin \Eloquent
 */
class Notice extends Model
{
    protected $dates = [
        'start_at',
        'end_at',
    ];

    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne(NoticeType::class, 'id', 'type_id');
    }

    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
