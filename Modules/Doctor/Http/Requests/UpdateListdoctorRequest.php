<?php

namespace Modules\Doctor\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateListdoctorRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'hoTen'=>'required',
            'ngaySinh'=>'required',
            'gioiTinh'=>'required',
            'diaChi'=>'required',
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'hoTen.required'=>'Vui lòng nhập họ tên!',
            'ngaySinh.required'=>'Vui lòng nhập ngày sinh!',
            'gioiTinh.required'=>'Vui lòng nhập giới tính!',
            'diaChi.required'=>'Vui lòng nhập địa chỉ!',
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
