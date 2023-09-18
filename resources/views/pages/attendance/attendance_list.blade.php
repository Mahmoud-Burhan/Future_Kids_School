@extends('layouts.master')
@section('css')

@section('title')
    {{trans('attendance.Attendance_list_Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('attendance.Attendance_list_Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('attendance.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('attendance.Attendance_list_Title')}}</li>
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
                    <form method="post" action="{{route('StudentAttendance.store')}}">
                        @csrf
                        <br>
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr class="table table-success">
                                    <th>#</th>
                                    <th>{{trans('attendance.Student_Name')}}</th>
                                    <th>{{trans('attendance.Email')}}</th>
                                    <th>{{trans('attendance.Gender')}}</th>
                                    <th>{{trans('attendance.Grade_List')}}</th>
                                    <th>{{trans('attendance.Classroom_List')}}</th>
                                    <th>{{trans('attendance.Section')}}</th>
                                    <th>{{trans('attendance.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->Gender->name}}</td>
                                        <td>{{$student->Grades->name}}</td>
                                        <td>{{$student->Classroom->class_name}}</td>
                                        <td>{{$student->Section->section_name}}</td>
                                        <td>
                                            @if(isset($student->Attendance()->where('attendance_date',date('Y-m-d'))->first()->student_id))

                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendance[{{ $student->id }}]" disabled
                                                           {{ $student->attendance()->first()->attendance_status == 1 ? 'checked' : '' }}
                                                           class="leading-tight" type="radio" value="presence">
                                                    <span class="text-success">{{trans('attendance.Present')}}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendance[{{ $student->id }}]" disabled
                                                           {{ $student->attendance()->first()->attendance_status == 0 ? 'checked' : '' }}
                                                           class="leading-tight" type="radio" value="absent">
                                                    <span class="text-danger">{{trans('attendance.Absent')}}</span>
                                                </label>

                                            @else

                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendance[{{ $student->id }}]" class="leading-tight"
                                                           type="radio"
                                                           value="presence">
                                                    <span class="text-success">{{trans('attendance.Present')}}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendance[{{ $student->id }}]" class="leading-tight"
                                                           type="radio"
                                                           value="absent">
                                                    <span class="text-danger">{{trans('attendance.Absent')}}</span>
                                                </label>

                                            @endif

                                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                            <input type="hidden" name="classroom_id"
                                                   value="{{ $student->classroom_id }}">
                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                            <input type="hidden" name="teacher_id" value="{{ $teachers->teacher_id }}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success" type="submit">{{ trans('attendance.Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
