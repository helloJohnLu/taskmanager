<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 暂时用不到 authorize 方法，所以返回 true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      =>  'required|unique:projects|min:2',
            'thumbnail' =>  'image|dimensions:min_width=200,min_height=120'
        ];
    }


    public function messages()
    {
        return [
            'name.required'         =>  '请填写项目名称',
            'name.unique'           =>  '项目名称已被存在',
            'thumbnail.image'       =>  '缩略图必须是图片',
            'thumbnail.dimensions'  =>  '您上传的图片过小，请确保图片尺寸至少是 200x120 像素',
        ];
    }
}
