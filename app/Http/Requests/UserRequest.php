<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'profile_photo' => 'file|image|mimes:jpeg,png,jpg,gif|max:5120',
            'name' => 'required|max:30',
            'profile_body' => 'max:300',
        ];
    }

    public function attributes()
    {
        return [
            'required' => '必須項目です。',
            'name' => '名前',
            'profile_body' => 'プロフィール文',
            'image' => '指定されたファイルが画像ではありません。',
            'mimes' => '指定された拡張子(PNG/JPG/GIF)ではありません。',
            'max' => '指定されたファイル容量(5M)を超えています。',
        ];
    }
}
