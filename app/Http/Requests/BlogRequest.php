<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'blog_title' => 'required',
            'blog_information' => 'required',
            'blog_content' => 'required',
            'blog_type' => 'required',
            'blog_status' => 'required',
            'blog_image' => 'mimes:jpeg,png|dimensions:min_width=750,min_height=450',
        ];
    }

    public function messages ()
    {

        return [
            'blog_title.required' => 'กรุณาระบุชื่อเรื่อง',
            'blog_information.required' => 'กรุณาระบุคำอธิบายเบื้องต้น',
            'blog_content.required' => 'กรุณาระบุเนื้อหาของข่าว',
            'blog_type.required' => 'กรุณาระบุประเภทข่าวว่าจัดอยู่ในหมวดหมู่ไหน',
            'blog_status.required' => 'กรุณาระบุสถานะของข่าว',
//            'blog_image.required' => 'กรุณาอัพโหลดไฟล์รูปภาพประกอบ',
            'blog_image.mimes' => 'กรุณาอัพโหลดไฟล์เป็นนามสกุล .PNG และ .JPG เท่านั้น',
            'blog_image.dimensions' => 'กรุณาอัพโหลดรูปภาพที่มี ความกว้างและความยาวไม่น้อยกว่า 750 x 450 ',
        ];
    }
}

