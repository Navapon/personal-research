<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'rp_name' => 'required',
            'rp_abstract' => 'required',
            'rp_meta_tag' => 'required',
            'fund_id' => 'required',
            'rp_year' => 'required',
            'rp_amount' => 'required',
            'rp_status' => 'required',
            'rp_start' => 'required',
            'rp_end' => 'required',
            'rp_file' => 'mimes:pdf'
        ];
    }

    public function messages ()
    {
        return [
            'rp_name.required' => 'กรุณาระบุ ชื่อโครงการของท่าน',
            'rp_abstract.required' => 'กรุณาระบุ บทคัดย่อ',
            'rp_meta_tag.required' => 'กรุณาระบุ คำค้น',
            'fund_id.required' => 'กรุณาระบุ แหล่งทุน',
            'rp_year.required' => 'กรุณาระบุ ปีที่ได้รับทุน',
            'rp_amount.required' => 'กรุณาระบุ จำนวนเงินที่ได้รับ',
            'rp_status.required' => 'กรุณาระบุ สถานะของโครงการ',
            'rp_start.required' => 'กรุณาระบุ ระยะเวลาเริ่ม',
            'rp_end.required' => 'กรุณาระบุ ระยะเวลาสิ้นสุด',
            'rp_file.mimes' =>  'กรุณาแนบไฟล์ประเภท PDF เท่านั้น'
        ];
    }
}
