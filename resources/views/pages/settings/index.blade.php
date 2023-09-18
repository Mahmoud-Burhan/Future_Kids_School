@extends('layouts.master')
@section('css')

@section('title')
    {{trans('settings.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('settings.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('settings.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('settings.Title')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                 <form method="post" action="{{route('Setting.update','test')}}" enctype="multipart/form-data">
                     @csrf
                     {{method_field('PUT')}}
                     <div class="row">
                         <div class="col-md-6 border-right-2 border-right-blue-400">
                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.School_Name')}}
                                    <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="school_name" value="{{$settings['school_name']}}"  required type="text" class="form-control">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.current_academic_year')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="current_academic_year" id="current_academic_year"
                                            value="{{$settings['current_academic_year']}}" required type="text" class="form-control">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.school_name_acronym')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="school_name_acronym" id="school_name_acronym"
                                            value="{{$settings['school_name_acronym']}}" required type="text" class="form-control">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.phone')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="phone" id="phone" required type="text" class="form-control"
                                            value="{{$settings['phone']}}">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.school_email')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="school_email" id="school_email" required type="text" class="form-control"
                                            value="{{$settings['school_email']}}">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.address')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="address" id="address" required type="text"
                                            value="{{$settings['address']}}"class="form-control">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.end_first_term')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="end_first_term" id="end_first_term" required type="text" class="form-control"
                                            value="{{$settings['end_first_term']}}">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.end_second_term')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <input name="end_second_term" id="end_second_term" required type="text" class="form-control"
                                            value="{{$settings['end_second_term']}}">
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-lg-3 col-form-label" style="font-weight: bolder;font-size: 14px">
                                     {{trans('settings.logo')}}
                                     <span class="text-danger">*</span>
                                 </label>
                                 <div class="col-lg-9">
                                     <div class="mb-3">
                                       <img src="{{ URL::asset('Attachments/Settings_Logo/'.$logo_folder_name.'/'.$settings['logo']) }}"
                                                id="logo" alt="image not found" width="150" height="175">

                                     </div>
                                     <input name="logo" id="logo" accept="image/*" type="file" class="file-input"
                                            data-show-caption="false"  data-foucs
                                     onchange="readURL(this)">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <br>
                     <button type="submit" class="btn btn-success">{{trans('settings.Update')}}</button>
                 </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#logo').attr('src', e.target.result).width(150).height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
