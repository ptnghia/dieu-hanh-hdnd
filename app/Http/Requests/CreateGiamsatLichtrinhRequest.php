<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGiamsatLichtrinhRequest extends FormRequest
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
            'ngay'                  => 'required',
            'dia_diem'              => 'required',
            'thanh_phan_tham_du'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ngay.required'                 => 'Vui lòng nhập ngày giám sát',
            'dia_diem.required'             => 'Vui lòng nhập địa điểm công tác',
            'thanh_phan_tham_du.required'   => 'Vui lòng nhập thành phần tham dự'
        ];
    }
}
