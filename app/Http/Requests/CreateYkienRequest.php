<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateYkienRequest extends FormRequest
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
            'chu_de_id'             => 'required',
            'tieu_de'               => 'required',
            'noi_dung_y_kien'    => 'required',
        ];
    }
    public function messages()
    {
        return [
            'chu_de_id.required'                => 'Vui lòng chọn chủ đề',
            'tieu_de.required'                  => 'Vui lòng nhập tiêu đề ý kiến cử tri',
            'noi_dung_y_kien.required'          => 'Vui lòng nhập nội dung ý kiến cử tri',
        ];
    }
}
