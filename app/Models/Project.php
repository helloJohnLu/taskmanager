<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // 可填充数据的字段
    protected $fillable = ['name','thumbnail'];

    /**
     * 模型关联：项目 & 用户
     *
     * return 一对一 关联
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 模型关联：项目 & 任务
     *
     * @return 一对多 关联
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
