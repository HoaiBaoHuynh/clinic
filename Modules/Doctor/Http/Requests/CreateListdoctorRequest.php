<?php

namespace Modules\Doctor\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateListdoctorRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            /*'hoTen'=>'required',
            'ngaySinh'=>'required',
            'gioiTinh'=>'required',
            'Avatar'=> 'required|max:2048',
            'diaChi'=>'required',*/
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
            /*'hoTen.required'=>'Vui lòng nhập họ tên!',
            'ngaySinh.required'=>'Vui lòng nhập ngày sinh!',
            'gioiTinh.required'=>'Vui lòng nhập giới tính!',
            'Avatar.required'=>'Hãy thêm Avatar',
            'Avatar.max'=>'Kích thước ảnh không vượt quá 2MB',
            'diaChi.required'=>'Vui lòng nhập địa chỉ!',*/
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
