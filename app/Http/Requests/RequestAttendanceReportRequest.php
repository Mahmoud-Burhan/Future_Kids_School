<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAttendanceReportRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'classroom_id'=>'required',
            'section_id'=>'required',
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ];
    }

    public function messages()
    {
        return [
            'classroom_id.required' => trans('teacher_dashboard.Classroom_Required'),
            'section_id.required' => trans('teacher_dashboard.Section_Required'),
            'to.after_or_equal' => trans('teacher_dashboard.Search_Date'),
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ];
    }
}
