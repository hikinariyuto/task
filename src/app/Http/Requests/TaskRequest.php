<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'task' => ['required', 'string', 'max:20']
        ];
    }
            public function messages()
    {
        return [
            'task.required' => '※入力必須',
            'task.string' => '※文字列で入力',
            'task.max' => '※20文字以下で入力',
        ];
    }
}
