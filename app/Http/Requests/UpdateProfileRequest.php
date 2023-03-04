<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'          => 'required',
            'gioi_tinh'     => 'required',
            'dia_chi'       => 'required',
            'ngay_sinh'     => 'required|date',
            'dien_thoai'    => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Vui lòng nhập họ và tên',
            'gioi_tinh.required'    => 'Vui lòng chọn giới tính',
            'ngay_sinh.required'    => 'Vui lòng nhập ngày sinh',
            'dia_chi.required'      => 'Vui lòng nhập địa chỉ',
            'ngay_sinh.date'        => 'Ngày sinh không hợp lệ',
            'dien_thoai.required'   => 'Vui lòng nhập số điện thoại',
            'dien_thoai.numeric'    => 'Số điện thoại không hợp lệ',
            'file.mimes'            => 'Hình ảnh không đúng định dạng jpg hoặc png',
            'file.max'              => 'Kích thước hình tối đa là 2Mb',
            
        ];
    }
}
