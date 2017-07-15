<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceFormRequest extends FormRequest
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

            'rc_article_name' => 'required',
            'rc_abstract' => 'required',
            'rc_meta_tag' => 'required',
            'rc_publish_date' => 'required',
            'rc_proceeding_type' => 'required',
            'rc_present_type' => 'required',
            'rc_publish_level' => 'required',
            'rc_volume' => 'required|numeric',
            'rc_file' => 'required|mimes:pdf',
            'rc_meeting_name' => 'required',
            'rc_meeting_owner' => 'required',
            'rc_meeting_place' => 'required',
            'rc_meeting_province' => 'required',
            'rc_meeting_start' => 'required',
            'rc_meeting_end' => 'required',
            'rt_name' => 'required',

        ];
    }

    public function messages ()
    {
        return [

            'rc_article_name.required' => 'กรุณาระบุ ชื่อบทความของท่าน',
            'rc_abstract.required' => 'กรุณาระบุ บทคัดย่อของท่าน',
            'rc_meta_tag.required' => 'กรุณาระบุ คำสำคัญไว้สำหรับการค้นหา',
            'rc_publish_date.required' => 'กรุณาระบุ วันที่ทำการเผยแพร่',
            'rc_proceeding_type.required' => 'กรุณาระบุ ประเภทของ Proceeding',
            'rc_present_type.required' => 'กรุณาระบุ ประเภทของการนำเสนอ',
            'rc_publish_level.required' => 'กรุณาระบุ ระดับในการเผยแพร่',
            'rc_volume.required' => 'กรุณาระบุ ปีที่ ( Volume )',
            'rc_volume.numeric' => 'กรุณาระบุ ปีที่ ( Volume )เป็นตัวเลขเท่านั้น',
            'rc_file.required' => 'กรุณาอัพโหลดไฟล์เอกสาร',
            'rc_file.mimes'  => 'กรุณาแนบไฟล์ประเภท PDF เท่านั้น',
            'rc_meeting_name.required' => 'กรุณาระบุ ชื่อของการประชุมที่เข้าร่วม',
            'rc_meeting_owner.required' => 'กรุณาระบุ ชื่อเจ้าของหน่วยงานการประชุม',
            'rc_meeting_place.required' => 'กรุณาระบุ สถานที่จัดประชุม',
            'rc_meeting_province.required' => 'กรุณาระบุ จังหวัด/รัฐที่ การจัดประชุม',
            'rc_meeting_start.required' => 'กรุณาระบุ วันที่เริ่มต้นการประชุม',
            'rc_meeting_end.required' => 'กรุณาระบุ วันที่สิ้นสุดการประชุม',
            'rt_name.required' => 'กรุณาระบุ ผู้เขียน',

        ];
    }

}
