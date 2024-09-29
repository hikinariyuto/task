<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'group_name' => ['required', 'string', 'max:10', 'unique:groups'],
        ];
    }

    public function messages()
    {
        return [
            'group_name.required' => '※グループを入力',
            'group_name.string' => '※文字列で入力',
            'group_name.max' => '※10文字以下で入力',
            'group_name.unique' => '※既に存在しています',
        ];
    }

}
