<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name_ar'=>'required',
            'name_en'=>'required',
            'email'=>'required|unique:students,email,'.$this->id,
            'password'=>'required|string|min:6,'.$this->id,
            'gender_id'=>'required',
            'nationalities_id'=>'required',
            'blood_id'=>'required',
            'date_of_birth'=>'required|date',
            'grade_id'=>'required',
            'classroom_id'=>'required',
            'section_id'=>'required',
            'family_id'=>'required',
            'academic_year'=>'required',
        ];
    }

    public function messages()
    {
        return [

            'name_ar.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'nationalities_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'date_of_birth.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'family_id.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
        ];
    }
}
