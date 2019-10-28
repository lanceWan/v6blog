<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
    public function rules(Request $request)
    {
        // 添加标签
        if ($request->isMethod('post')) {
            return [
                'name' => 'required|unique:tags,name',
            ];
        }
        //  修改时 $request->method() 方法返回的是 PUT或PATCH
        return [
            'name' => [
                'required',
                Rule::unique('tags')->ignore($request->route('tag')),
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute不能为空',
            'unique' => ':attribute已经存在，无需重复添加',
        ];
    }

    public function attributes()
    {
        return [
            'name'  => '标签名称',
        ];
    }
}
