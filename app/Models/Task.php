<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // 可写入字段
    protected $fillable = ['title','project_id','completed'];

    /**
     * 模型关联：任务 & 项目
     *
     * @return 一对一 关联
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
