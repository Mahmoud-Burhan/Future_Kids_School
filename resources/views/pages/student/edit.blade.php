@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student.Edit_Student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('student.Edit_Student')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('student.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('student.Edit_Student')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    @if ($errors->any())
        <div class="alert alert-primary" role="alert">
            <div class="alert-icon">
                <i class="flaticon-warning "></i>
            </div>
            <div class="alert-text">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div><br />
    @endif
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h5 style="color: blue">{{trans('student.Personal_Information')}}</h5>
                    <br>
                    <form method="post" action="{{route('Student.update','test')}}"  enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Name_en')}}</label>
                                    <input type="text" name="name_en" id="name_en" required autocomplete="off"
                                           class="form-control" value="{{$students->getTranslation('name','en')}}">
                                    <input type="hidden" name="id" id="id" value="{{$students->id}}">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar"
                                           style="font-weight: bolder;font-size: 15px;padding-right: 3%">{{trans('student.Name_ar')}}</label>
                                    <input type="text" name="name_ar" id="name_ar" required autocomplete="off"
                                           class="form-control" value="{{$students->getTranslation('name','ar')}}">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Email')}}
                                    </label>
                                    <input type="email" name="email" id="email" required autocomplete="off"
                                           class="form-control" value="{{$students->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password"
                                           style="font-weight: bolder;font-size: 15px;padding-right: 3%">{{trans('student.Password')}}</label>
                                    <input type="password" name="password" id="password" required autocomplete="off"
                                           class="form-control" value="{{$students->password}}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Gender')}}
                                    </label>
                                    <select name="gender_id" id="gender_id" class="form-control" style=" height: 10%">
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}" {{($students->gender_id == $gender->id)?'selected':''}}>
                                                {{$gender->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nationalities_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Nationality')}}
                                    </label>
                                    <select name="nationalities_id" id="nationalities_id" class="form-control"
                                            style=" height: 10%">
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{$nationality->id}}" {{($students->nationalities_id == $nationality->id)?'selected':''}}>
                                                {{$nationality->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nationalities_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="blood_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Blood_Type')}}
                                    </label>
                                    <select name="blood_id" id="blood_id" class="form-control" style=" height: 10%">
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        @foreach($blood_types as $blood_type)
                                            <option value="{{$blood_type->id}}"{{($students->blood_id == $blood_type->id)?'selected':''}}>
                                                {{$blood_type->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('blood_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date_of_birth"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.DOB')}}
                                    </label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                           style=" height: 10%" value="{{$students->date_of_birth}}">
                                    @error('date_of_birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <br>

                        <h5 style="color: blue">{{trans('student.Student_Information')}}</h5>
                        <br>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="grade_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Grade')}}
                                    </label>
                                    <select name="grade_id" id="grade_id" class="form-control" style=" height: 10%">
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}"{{($students->grade_id == $grade->id)?'selected':''}}>
                                                {{$grade->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="classroom_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Classroom')}}
                                    </label>
                                    <select name="classroom_id" id="classroom_id" class="form-control"
                                            style=" height: 10%">
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->id}}" {{($students->classroom_id == $classroom->id)?'selected':''}}>
                                                {{$classroom->class_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Section')}}
                                    </label>
                                    <select name="section_id" id="section_id" class="form-control" style=" height: 10%">
                                        <option selected disabled>{{trans('student.Select')}}</option>
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}" {{($students->section_id == $section->id)?'selected':''}}>
                                                {{$section->section_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="family_id"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Family')}}
                                    </label>
                                    <select name="family_id" id="family_id" class="form-control" style=" height: 10%">
                                        @foreach($families as $family)
                                            <option value="{{$family->id}}" {{($students->family_id == $family->id)?'selected':''}}>
                                                {{$family->father_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('family_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"
                                           style="font-weight: bolder;font-size: 14px;padding-right: 3%">{{trans('student.Academic')}}
                                    </label>
                                    <select name="academic_year" id="academic_year" class="form-control" style=" height: 10%">

                                        <option value="{{date('Y')}}" {{($students->academic_year == date('y'))?'selected':''}}>
                                            {{date('Y')}}
                                        </option>
                                        <option value="{{date('Y')+1}}"{{($students->academic_year == (date('y')+1))?'selected':''}}>
                                            {{date('Y') + 1}}
                                        </option>
                                        <option value="{{date('Y')+2}}"{{($students->academic_year == (date('y')+2))?'selected':''}}>
                                            {{date('Y') + 2}}
                                        </option>
                                    </select>
                                    @error('academic_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('student.Update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
