<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVanbanRequest extends FormRequest
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
            'so_hieu'           => 'required',
            'loai_vanban_id'    => 'required',
            'coquan_banhanh_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'ten.required'                  => 'Vui lòng nhập tiêu đề văn bản',
            'so_hieu.required'              => 'Vui lòng nhập số hiệu/kí hiệu văn bản',
            'loai_vanban_id.required'       => 'Vui lòng chọn loại văn bản',
            'coquan_banhanh_id.required'    => 'Vui lòng chọn cơ quan ban hành',
        ];
    }
}
