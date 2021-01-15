<?php

//参考にしたサイト
// https://qiita.com/sakuraya/items/abca057a424fa9b5a187

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;





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

        return ['id' => 'required|exists:schedules,id,deleted_at,NULL'];
    }

    public function validationData()
    {
        // dd($this->all(), $this->route()->parameters());
        return [
            'id' => $this->id
        ];
    }


    public function messages()
    {
        return [
            'id.required' => '予定が必要だよ',
            'id.exists' => '予定が存在しないよ',
        ];
    }

    protected function failedValidation(Validator $validator) {
        
        throw new HttpResponseException(response()->json([
            'success' => false,
            'code' => 404,
            'message' => $validator->errors()->toArray(),
        ], 404));
    }
}
