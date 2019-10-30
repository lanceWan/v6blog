<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'category_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute不能为空',
        ];
    }

    public function attributes()
    {
        return [
            'category_id'  => '分类',
            'title'  => '标题',
            'tags'  => '标签',
            'status'  => '状态',
            'body'  => '文章内容',
        ];
    }
}
