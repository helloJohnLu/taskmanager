<?php

namespace App\Models;

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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 模型关联：用户 & 项目
     * @return 一对多关联
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }


    /**
     * 模型关联：用户 & 任务 （一个用户通过项目拥有多个任务）
     *
     * @return 一对多 远层
     */
    public function tasks()
    {
        return $this->hasManyThrough('App\Models\Task','App\Models\Project');
    }
}
