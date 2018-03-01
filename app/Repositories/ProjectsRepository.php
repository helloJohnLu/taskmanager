<?php
/**
 * 创建项目类
 * User: John
 * Date: 2018/3/1
 * Time: 4:27
 */

namespace App\Repositories;

use \Intervention\Image\Facades\Image;


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
            Image::make($file)->resize(200,120)->save($path);

            return $name;
        }
    }
}