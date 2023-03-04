<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChucvuRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ten' => 'required|unique:chuc_vus'
        ];
    }
    public function messages()
    {
        return [
            'ten.required'  => 'Vui lòng nhập tên chức vụ',
            'ten.unique'    => 'Chức vụ đã tồn tại'
        ];
    }
}
