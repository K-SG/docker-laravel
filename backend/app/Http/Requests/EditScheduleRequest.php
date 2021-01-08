<?php

//参考にしたサイト
// https://qiita.com/sakuraya/items/abca057a424fa9b5a187

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class EditScheduleRequest extends FormRequest
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
            'title' => 'required|max:100',
            'schedule_date' => 'required',
            'place' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'content' => 'max:1440',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してね',
            'title.max' => 'タイトルが長すぎるよ。100文字いないにしてね',
            'schedule_date.required' => 'メールアドレスを入力してね',
            'place.required' => 'パスワードを入力してね',
            'start_time.required' => 'パスワードを短すぎるよ。8文字以上にしてね',
            'end_time.required' => 'パスワードを短すぎるよ。8文字以上にしてね',
            'content.max' => '内容が長すぎるよ。1440文字以内にしてね',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'code' => 400,
            'message' => $validator->errors()->toArray(),
        ], 400));
    }
}
