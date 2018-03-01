<?php
/**
 * 创建项目类
 * User: John
 * Date: 2018/3/1
 * Time: 4:27
 */

namespace App\Repositories;

use Intervention\Image\Facades\Image;

class ProjectsRepository
{
    /**
     * 新建项目
     *
     * @param $request
     */
    public function newProject($request)
    {
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumbnail($request),
        ]);
    }

    /**
     * 更新项目
     *
     * @param $project
     * @param $request
     */
    public function updateProject($project, $request)
    {
        $project->name = $request->name;

        // 如果用户有上传图片
        if ($request->thumbnail) {
            // 删除原图片
            $this->delThumbnail($project);
            
            $project->thumbnail = $this->thumbnail($request);
        }

        $project->save();
    }

    /**
     * 上传图片处理
     *
     * @param $request
     *
     * @return string  文件名
     */
    public function thumbnail($request)
    {
        // 判断，如果用户有上传图片
        if ($request->hasFile('thumbnail')) {
            // 获取表单提交上传的图片
            $file = $request->thumbnail;
            // 给图片起一个随机字符的文件名
            $name = str_random(15) . '.jpg';
            // 图片存储的路径
            $path = public_path() . '/thumbnails/' . $name;
            // 写入
            Image::make($file)->resize(262,200)->save($path);

            return $name;
        }
    }

    public function delThumbnail($project)
    {
        // 获取缩略图名称
        $file = $project->thumbnail;
        // 拼接路径
        $path = public_path() . '/thumbnails/' . $file;
        // 删除
        unlink($path);

    }
}