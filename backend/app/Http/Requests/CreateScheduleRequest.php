<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator; 


class CreateScheduleRequest extends FormRequest
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
            'schedule_date' => 'required|date_format:"Y-m-d"',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'place' => 'required|integer|between:0,2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '入力されていない項目があるよ',
            'title.max' => 'タイトルは100文字以内で入力してね',
            'schedule_date.required' => '入力されていない項目があるよ',
            'schedule_date.date_format' => '正しい日付を入力してね',
            'start_time.required' => '入力されていない項目があるよ',
            'start_time.date_format' => '正しい時間を入力してね',
            'end_time.required' => '入力されていない項目があるよ',
            'end_time.date_format' => '正しい時間を入力してね',
            'end_time.after' => '開始時間よりも後の時間を入力してね',
            'place.required' => '入力されていない項目があるよ',
            'place.integer' => '整数値で入力してね',
            'place.between' => '0から2の整数値で入力してね',
        ];
    }

    protected function failedValidation(Validator $validator) {

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