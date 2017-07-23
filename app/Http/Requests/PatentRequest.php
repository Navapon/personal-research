<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'pt_name' => 'required',
//            'pt_number' => 'required',
            'pt_description' => 'required',
            'pt_meta_tag' => 'required',
//            'pt_type' => 'required',
//            'pt_publish_level' => 'required',
//            'pt_accept' => 'required',
//            'pt_expire' => 'required',
        ];
    }

    public function messages ()
    {
        return [
            'pt_name.required' => 'กรุณาระบุ ชื่อผลงานของท่าน',
//            'pt_number.required' => 'กรุณาระบุ เลขที่ออก',
            'pt_description.required' => 'กรุณาระบุ รายละเอียดผลงาน',
            'pt_meta_tag.required' => 'กรุณาระบุ คำค้น',
//            'pt_type.required' => 'กรุณาระบุ ประเภท',
//            'pt_publish_level.required' => 'กรุณาระบุ ระดับของสิทธิบัตร',
//            'pt_accept.required' => 'กรุณาระบุ ระบุวันที่ออก',
//            'pt_expire.required' => 'กรุณาระบุ ระบุวันหมดอายุ'
        ];
    }
}
