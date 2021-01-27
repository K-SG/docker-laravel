<?php

//参考にしたサイト
// https://qiita.com/sakuraya/items/abca057a424fa9b5a187

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:15',
            'email' => 'required|email:strict|unique:users,email',
            'password' => 'required|min:8|max:20|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してね。',
            'name.max' => '名前が長すぎるよ。15文字以内で答えてね。',
            'email.required' => 'メールアドレスを入力してね。',
            'email.email' => 'メールアドレスが不正だよ。',
            'email.unique' => 'メールアドレスがかぶっているよ。',
            'password.required' => 'パスワードを入力してね。',
            'password.max' => 'パスワードが長すぎるよ。20文字以下にしてね。',
            'password.min' => 'パスワードを短すぎるよ。8文字以上にしてね。',
            'password.regex' => 'パスワードが不正だよ。大文字小文字と英数字すべて含めてね。',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        $messages = "";
        $counter = 0;
        foreach($validator->errors()->toArray() as $messageArray){
            foreach($messageArray as $message){
                if($counter==0){
                    $messages .= $message;
                    $counter++;
                }else{
                    $messages .= "\n".$message;
                }
            }   
        }

        throw new HttpResponseException(response()->json([
            'success' => false,
            'code' => 400,
            'message' => $messages,//$validator->errors()->toArray(),
        ], 400));
    }
}
