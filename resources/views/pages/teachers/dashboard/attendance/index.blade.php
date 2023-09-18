@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teacher_dashboard.Attendance_List')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('teacher_dashboard.Attendance_List')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('attendance.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('teacher_dashboard.Attendance_List')}}</li>
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
                    <h5 style="color: red">{{trans('attendance.Today_Date')}} : {{date('d-m-Y')}}</h5>
                    <form method="post" action="{{route('store_attendance')}}">
                        @csrf
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table table-success">
                                <th>#</th>
                                <th>{{trans('teacher_dashboard.Student_Name')}}</th>
                                <th>{{trans('teacher_dashboard.Email')}}</th>
                                <th>{{trans('teacher_dashboard.Gender')}}</th>
                                <th>{{trans('teacher_dashboard.Grade_name')}}</th>
                                <th>{{trans('teacher_dashboard.Class_name')}}</th>
                                <th>{{trans('teacher_dashboard.Section_name')}}</th>
                                <th>{{trans('teacher_dashboard.Attendance_Action')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr style="text-align: center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->Gender->name}}</td>
                                    <td>{{$student->Grades->name}}</td>
                                    <td>{{$student->Classroom->class_name}}</td>
                                    <td>{{$student->Section->section_name}}</td>
                                    <td>
                                       <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                           <input name="attendance[{{$student->id}}]"
                                           @foreach($student->Attendance()->where('attendance_date',date('Y-m-d'))->get() as $attendance)
                                               {{$attendance->attendance_status ==1 ?'checked':''}}
                                           @endforeach
                                           type="radio" value="present" class="leading-tight">
                                           <span class="text-success">{{trans('teacher_dashboard.Present')}}</span>
                                       </label>

                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                               <input name="attendance[{{$student->id}}]"
                                                @foreach($student->Attendance()->where('attendance_date',date('Y-m-d'))->get() as $attendance)
                                                    {{$attendance->attendance_status ==0 ?'checked':''}}
                                                @endforeach
                                                type="radio" value="absent" class="leading-tight">
                                        <span class="text-danger">{{trans('teacher_dashboard.Absent')}}</span>
                                        </label>
                                        <input type="hidden" name="student_id" id="student_id" value="{{$student->id}}">
                                        <input type="hidden" name="grade_id" id="grade_id" value="{{$student->grade_id}}">
                                        <input type="hidden" name="classroom_id" id="classroom_id" value="{{$student->classroom_id}}">
                                        <input type="hidden" name="section_id" id="section_id" value="{{$student->section_id}}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit" style="width: 10%">{{ trans('attendance.Save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')

@endsection
