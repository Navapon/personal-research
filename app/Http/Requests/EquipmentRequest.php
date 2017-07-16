<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            're_name' => 'required',
            're_building' => 'required',
            're_serial_number' => 'required',
            're_major' => 'required',
            're_phone' => 'required',
            're_description' => 'required',
            're_year' => 'required',
            're_number' => 'required',
            're_namenumber' => 'required',
            're_status' => 'required',
            're_file' => 'mimes:jpeg,png',
        ];
    }

    public function messages ()
    {
        return [
            're_name.required' => 'กรุณาระบุชื่อ เครื่องมือวิจัย',
            're_building.required' => 'กรุณาระบุชื่อ ตึกที่เก็บเครื่องมือ',
            're_serial_number.required' => 'กรุณาระบุรหัส เครื่องมือวิจัยหรือครุภัณฑ์',
            're_major.required' => 'กรุณาระบุสาขา ที่ดูแลเครื่องมือวิจัย',
            're_phone.required' => 'กรุณาระบุ เบอร์ติดต่อ',
            're_description.required' => 'กรุณาระบุ รายละเอียดของเครื่องมือ',
            're_year.required' => 'กรุณาระบุ ปีของเครื่องมือ',
            're_number.required' => 'กรุณาระบุ จำนวนเครื่องมือ',
            're_namenumber.required' => 'กรุณาระบุ หน่วยนับ',
            're_status.required' => 'กรุณาระบุ สถานะของเครื่องมือ',
            're_file.mimes' => 'กรุณาอัพโหลดไฟล์เฉพาะนามสกุล PNG และ JPEG ',

        ];
    }
}
