<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGiamsatRequest extends FormRequest
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
            'ten'               => 'required',
            'noi_dung'          => 'required',
            'thoi_gian_star'    => 'required',
            'thoi_gian_end'     => 'required'
        ];
    }
    public function messages()
    {
        return [
            'ten.required'              => 'Vui lòng nhập tên hoạt động giám sát',
            'noi_dung.required'         => 'Vui lòng nhập nội dung giám sát',
            'thoi_gian_star.required'   => 'Vui lòng nhập thời gian bắt đầu',
            'thoi_gian_end.required'    => 'Vui lòng nhập thời gian kết thúc',
        ];
    }
}
