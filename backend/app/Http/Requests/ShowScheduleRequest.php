<?php

//参考にしたサイト
// https://qiita.com/sakuraya/items/abca057a424fa9b5a187

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class ShowScheduleRequest extends FormRequest
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
            'date' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してね',
            'date.date' => '日付型を入力してね',
            'date.date_format' => 'Y-m-d形式で入力してね',
        ];
    }

    protected function failedValidation(Validator $validator) {
        
        throw new HttpResponseException(response()->json([
            'success' => false,
            'code' => 400,
            'message' => $validator->errors()->toArray(),
        ], 400));
    }
}