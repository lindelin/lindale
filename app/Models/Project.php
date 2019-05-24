<?php

namespace App\Models;

use App\Events\Project\ProjectCreated;
use App\Events\Project\ProjectDeleted;
use App\Events\Project\ProjectUpdated;
use App\Models\Relations\BelongsToMany\BelongsToUsers;
use App\Models\Relations\HasMany\ProjectHasMany;
use App\Models\Relations\HasOne\HasOneLeader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Colorable;

class Project extends Model
{
    use Notifiable, BelongsToUsers, HasOneLeader, ProjectHasMany;

    /**
     * タイミングイベント定義。
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ProjectCreated::class,
        'updated' => ProjectUpdated::class,
        'deleted' => ProjectDeleted::class,
    ];

    protected $dates = [
        'start_at',
        'end_at',
    ];

    /**
     * Slack 频道的通知路由.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return project_config($this, config('config.project.key.slack'));
    }

    /**
     * 画像
     * @return string
     */
    public function image()
    {
        if (Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        } else {
            return asset(Colorable::lindaleImage());
        }
    }

    /**
     * 管理しているプロジェクト
     * @param  Builder  $query
     * @param $userId
     * @return Builder
     */
    public function scopeManagedBy($query, int $userId)
    {
        return $query->where('user_id', $userId)
            ->orWhere('sl_id', $userId);
    }
}
