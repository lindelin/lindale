<?php

namespace App;

use App\Events\User\UserCreated;
use App\Models\User\Device;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use File;
use Colorable;

/**
 * App\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $photo
 * @property string $content
 * @property string $mobile
 * @property string $phone
 * @property string $fax
 * @property string $company
 * @property string $location
 * @property string $facebook
 * @property string $slack
 * @property string $github
 * @property string $qq
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Settings\UserSettings[] $Config
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project\Project[] $MyProjects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project\Project[] $MySlProjects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project\Project[] $Projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\Task[] $Tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Todo\TodoList[] $TodoLists
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Todo\Todo[] $Todos
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereGithub($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereQq($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSlack($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project\Project[] $favorites
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * @var array
     */
    protected $touches = ['Projects'];

    /**
     * タイミングイベント定義。
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | ManyHasMany 一对多
    |--------------------------------------------------------------------------
    */

    /**
     * 多个用户拥有多个项目
     * 多对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Projects()
    {
        return $this->belongsToMany('App\Project\Project')->withPivot('is_admin')->withTimestamps();
    }

    /**
     * 多个用户拥有多个项目
     * 多对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Project\Project', 'favorites', 'user_id', 'project_id')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | HasMany 一对多
    |--------------------------------------------------------------------------
    */

    /**
     * 一个项目总监拥有多个项目
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function MyProjects()
    {
        return $this->hasMany('App\Project\Project', 'user_id', 'id');
    }

    /**
     * 一个项目副总监拥有多个项目
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function MySlProjects()
    {
        return $this->hasMany('App\Project\Project', 'sl_id', 'id');
    }

    /**
     * 一个用户拥有多个To-do
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Todos()
    {
        return $this->hasMany('App\Todo\Todo', 'user_id', 'id');
    }

    /**
     * 一个用户有多个To-do列表
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TodoLists()
    {
        return $this->hasMany('App\Todo\TodoList', 'user_id', 'id');
    }

    /**
     * 一个用户有多个设定值
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Config()
    {
        return $this->hasMany('App\Settings\UserSettings', 'user_id', 'id');
    }

    /**
     * 一个用户有多个任务
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany('App\Task\Task', 'user_id', 'id');
    }

    /**
     * Device Tokens
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany(Device::class, 'user_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | Other 其他
    |--------------------------------------------------------------------------
    */

    /**
     * Send the password reset notification.
     * 重写.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, session('lang_guest')));
    }

    /**
     * Slack 频道的通知路由.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return user_config(self::find($this->id), config('config.user.key.slack'));
    }

    /**
     * event persona
     * @param $query
     */
    public function scopeTaskEventPersona($query, $event)
    {
        $query->where('id', $event->user->id ?? 0)
            ->orWhere('id', $event->task->User->id ?? 0)
            ->orWhere('id', $event->task->Project->ProjectLeader->id ?? 0)
            ->orWhere('id', $event->task->Project->SubLeader->id ?? 0);
    }

    /**
     * event persona
     * @param $query
     */
    public function scopeTodoEventPersona($query, $event)
    {
        $query->where('id', $event->user->id ?? 0)
            ->orWhere('id', $event->todo->User->id ?? 0)
            ->orWhere('id', $event->todo->Project->ProjectLeader->id ?? 0)
            ->orWhere('id', $event->todo->Project->SubLeader->id ?? 0);
    }

    /**
     * Photo Path
     * @return string
     */
    public function photoPath()
    {
        if ($this->photo != '' and File::exists(public_path('storage/'.$this->photo))) {
            return asset('storage/'.$this->photo);
        }

        return asset(Colorable::lindaleProfileImg($this->email));
    }
}
