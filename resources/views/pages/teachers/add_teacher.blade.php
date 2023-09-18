@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teacher.Add_title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('teacher.Add_title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('teacher.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">    {{trans('teacher.Add_title')}}</li>
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
                    <form action="{{route('Teacher.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Email')}}</label>
                                    <input type="email" class="form-control" name="email" id="email" required
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Password')}}</label>
                                    <input type="password" class="form-control" name="password" id="password" required
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Name_ar')}}</label>
                                    <input type="text" class="form-control" name="name_ar" id="name_ar" required
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Name_en')}}</label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" required
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="specialization_id"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Specialization')}}</label>
                                    <select name="specialization_id" id="specialization_id" class="form-control" style="height: 10%">
                                        <option disabled selected>{{trans('teacher.Select')}}</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender_id"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Gender')}}</label>
                                    <select name="gender_id" id="gender_id" class="form-control" style="height: 10%">
                                        <option disabled selected>{{trans('teacher.Select')}}</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="joining_date"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Joining_Date')}}</label>
                                    <input type="date" class="form-control" name="joining_date" id="joining_date"
                                           required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('teacher.Address')}}</label>
                                    <textarea class="form-control" name="address" id="address" rows="5"
                                              autocomplete="off"> </textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">{{trans('teacher.Save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
