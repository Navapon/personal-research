<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalFormRequest extends FormRequest
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
            'rj_article_name' => 'required',
            'rj_name' => 'required',
            'rj_owner' => 'required',
            'rj_source_url' => 'required|min:10',
            'fund_id' => 'required',
            'date_rj_accept_date_submit' => 'required',
            'date_rj_publish_date_submit' => 'required',
            'rj_publish_level' => 'required',
            'rj_volume' => 'required|numeric',
            'rj_no' => 'required|numeric',
            'rj_page' => 'required',
            'rj_meta_tag' => 'required',
            'rj_abstract' => 'required',
            'rj_file' => 'required',
        ];
    }

    public function messages ()
    {
        return [
            'rj_article_name.required' => 'กรุณาระบุ ชื่อของบทความของท่าน',
            'rj_name.required' => 'กรุณาระบุ ชื่อของวารสารที่ท่านได้รับการเผยแพร่',
            'rj_owner.required' => 'กรุณาระบุ ชื่อหน่วยงานเจ้าของวารสาร',
            'rj_source_url.required' => 'กรุณาระบุ url ฐานข้อมูลที่ท่านเผยแพร่วารสาร',
            'rj_source_url.min' => 'กรุณาระบุ url "จริง" ของฐานข้อมูลของท่าน',
            'fund_id.required' => 'กรุณาระบุ แหล่งทุนงานวิจัยของท่าน',
            'rj_accept_date.required' => 'กรุณาระบุ วันที่ได้รับการตอบรับวารสาร',
            'rj_publish_date.required' => 'กรุณาระบุ วันที่วารสารได้รับการเผยแพร่ลงฐานข้อมูล',
            'rj_publish_level.required' => 'กรุณาระบุ ระดับของงานของวารสาร',
            'rj_volume.required' => 'กรุณาระบุ ปีที่ของวารสาร',
            'rj_volume.numeric' => 'กรุณาระบุ ปีที่ของวารสารเป็นตัวเลขเท่านั้น',
            'rj_no.required' => 'กรุณาระบุ ฉบับที่ของวารสาร',
            'rj_no.numeric' => 'กรุณาระบุ ฉบับที่ของวารสารเป็นตัวเลขเท่านั้น',
            'rj_page.required' => 'กรุณาระบุ หน้าที่ของวารสาร',
            'rj_meta_tag.required' => 'กรุณาระบุ คำสำคัญเพื่อไว้ใช้สำหรับการค้นหา',
            'rj_abstract.required'  => 'กรุณาระบุ บทคัดย่อ ของงานวิจัยของท่าน',
            'rj_file.required'  => 'กรุณาแนบไฟล์ เพื่อใช้สำหรับอ้างอิงงานวิจัยท่าน'
        ];
    }
}
