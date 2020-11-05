<?php

namespace Modules\Doctor\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateServiceRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            /*'maSo' => 'required',
            'tenDichVu' => 'required',
            'chiTiet' => 'required',
            'ghiChu' => 'required',
            'gia' => 'required',*/
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
            /*'maSo.required' => 'Hãy nhập mã số!',
            'tenDichVu.required' => 'Hãy nhập tên dịch vụ!',
            'chiTiet.required' => 'Hãy nhập chi tiết!',
            'ghiChu.required' => 'Hãy nhập ghi chú!',
            'gia.required' => 'Hãy nhập giá!',*/
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
