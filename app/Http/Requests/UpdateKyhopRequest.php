<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKyhopRequest extends FormRequest
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
            'ten'           => 'required',
            'thoi_gian'     => 'required',
            'dia_diem'      => 'required',
            'co_quan'       => 'required'
        ];
    }
    public function messages()
    {  
        return [
            'ten.required'          => 'Vui lòng nhập tiêu đề văn bản',
            'thoi_gian.required'    => 'Vui lòng nhập thời gian hợp',
            'dia_diem.required'     => 'Vui lòng địa điểm tổ chức',
            'co_quan.required'      => 'Vui lòng nhập cơ quan tổ chức',
        ];
    }
}
