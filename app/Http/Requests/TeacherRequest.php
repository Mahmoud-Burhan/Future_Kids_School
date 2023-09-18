<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
            'email'=>'required|unique:teachers,email,'.$this->id,
            'name_ar'=>'required|unique:teachers,name->ar,'.$this->id,
            'name_en'=>'required|unique:teachers,name->en,'.$this->id,
            'password'=>'required'.$this->id,
            'specialization_id'=>'required'.$this->id,
            'gender_id'=>'required'.$this->id,
            'joining_date'=>'required'.$this->id,
            'address'=>'required'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'name_ar.required' => trans('validation.required'),
            'name_ar.unique' => trans('validation.unique'),
            'name_en.required' => trans('validation.required'),
            'name_en.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'specialization_id.required' => trans('validation.required'),
            'gender_id.required' => trans('validation.required'),
            'joining_date.required' => trans('validation.required'),
            'address.required' => trans('validation.required'),
        ];
    }
}
