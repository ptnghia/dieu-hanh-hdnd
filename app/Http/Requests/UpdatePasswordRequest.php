<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8'],
            'new_confirm_password' => ['same:new_password'],
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu cũ',
            'new_password.required'     => 'Vui lòng nhập mật khẩu mới',
            'new_password.string'       => 'Mật khẩu không hợp lệ',
            'new_password.min'          => 'Mật khẩu tối thiểu 8 ký tự',
            'new_confirm_password.same' => 'Mật khẩu xác nhận không đúng'
        ];
    }
}
