<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateThanhvienReques extends FormRequest
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
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
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
            'email.required'        => 'Vui lòng nhập email',
            'email.email'           => 'Email không hợp lệ',
            'email.unique'          => 'Email đã tồn tại',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            'password.min'          => 'Mật khẩu tối thiểu 8 ký tự',
        ];
    }
}
