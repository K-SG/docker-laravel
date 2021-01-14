<?php

//参考にしたサイト
// https://qiita.com/sakuraya/items/abca057a424fa9b5a187

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class DeleteScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $id = $this->route('id');
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return [
        //     'date' => 'required|date|date_format:Y-m-d',
        // ];
        return ['id' => 'exists:schedules,id,deleted_at,NULL'];
    }

    public function messages()
    {
        return [
            'id.exists' => '予定が存在しないよ',
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
