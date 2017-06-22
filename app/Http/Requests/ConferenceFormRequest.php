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
            'rc_file' => 'required',
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

        ];
    }

}
