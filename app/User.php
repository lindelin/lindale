<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Projects()
    {
        return $this->belongsToMany('App\Project\Project')->withPivot('is_admin')->withTimestamps();
    }

    public function MyProjects()
    {
        return $this->hasMany('App\Project\Project', 'user_id', 'id');
    }
}
