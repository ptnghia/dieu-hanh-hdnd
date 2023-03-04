<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKyhopThumoiRequest extends FormRequest
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
            'so'            => 'required',
            'dia_diem'      => 'required',
            'thoi_gian'     => 'required',
            'noi_dung'      => 'required',
            'co_quan_ky'    => 'required',
            'nguoi_ky'      => 'required',
        ];
    }
    public function messages()
    {
        return [
            'so.required'           => 'Vui lòng nhập số hiệu thư mời',
            'dia_diem.required'     => 'Vui lòng nhập địa điểm',
            'thoi_gian.required'    => 'Vui lòng nhập thời gian',
            'noi_dung.required'     => 'Vui lòng nhập nội dung',
            'co_quan_ky.required'   => 'Vui lòng nhập tên cơ quan - chức vụ',
            'nguoi_ky.required'     => 'Vui lòng nhập họ tên người ký'
        ];
    }
}
