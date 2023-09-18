@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teacher_dashboard.Attendance_Report')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">     {{trans('teacher_dashboard.Attendance_Report')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color">    {{trans('teacher_dashboard.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('teacher_dashboard.Attendance_Report')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h5 style="font-weight: bolder;color: blue">{{trans('teacher_dashboard.Searching_Information')}}</h5>
                    <form method="post" action="{{route('attendance.search')}}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="font-weight: bolder;"
                                           for="classroom_id">{{trans('teacher_dashboard.Class_name')}}</label>
                                    <select class="form-control" name="classroom_id" id="classroom_id"
                                            style="height: 5%;" required onchange="console.log($(this).val())">
                                        <option selected disabled>{{trans('teacher_dashboard.Select')}}</option>
                                        @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="font-weight: bolder;"
                                           for="section_id">{{trans('teacher_dashboard.Sections')}}</label>
                                    <select class="form-control" name="section_id" id="section_id" style="height: 5%;"
                                            onchange="console.log($(this).val())" required>
                                        <option selected disabled>{{trans('teacher_dashboard.Select')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="font-weight: bolder;"
                                           for="student_id">{{trans('teacher_dashboard.student')}}</label>
                                    <select class="form-control" name="student_id" id="student_id" style="height: 5%;"
                                            required="required">
                                        <option value="0">{{trans('teacher_dashboard.All')}}</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label style="font-weight: bolder;"
                                           for="students">{{trans('teacher_dashboard.Report_Date')}}</label>
                                    <div class="input-group" data-date-format="yyyy-mm-dd">
                                        <span class="input-group-addon">{{trans('teacher_dashboard.From_Date')}}</span>
                                        <input type="text" class="form-control range-from date-picker-default"
                                               placeholder="{{trans('teacher_dashboard.Beginning_Date')}}" required
                                               name="from">
                                        <span class="input-group-addon">{{trans('teacher_dashboard.To_Date')}}</span>
                                        <input class="form-control range-to date-picker-default"
                                               placeholder="{{trans('teacher_dashboard.Ending_Date')}}" type="text"
                                               required name="to">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success"
                                style="width: 7%;">{{trans('teacher_dashboard.Search')}}</button>
                    </form>
                    <br>
                    <br>
                    @isset($attendances)
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr class="table table-success">
                                    <th>#</th>
                                    <th>{{trans('teacher_dashboard.Student_Name')}}</th>
                                    <th>{{trans('teacher_dashboard.Grade_name')}}</th>
                                    <th>{{trans('teacher_dashboard.Class_name')}}</th>
                                    <th>{{trans('teacher_dashboard.Section_name')}}</th>
                                    <th>{{trans('teacher_dashboard.Date')}}</th>
                                    <th>{{trans('teacher_dashboard.Status')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($attendances as $attendance)
                                     <tr style="text-align: center">
                                         <td>{{$loop->iteration}}</td>
                                         <td>{{$attendance->Student->name}}</td>
                                         <td>{{$attendance->Grades->name}}</td>
                                         <td>{{$attendance->Classroom->class_name}}</td>
                                         <td>{{$attendance->Section->section_name}}</td>
                                         <td>{{$attendance->attendance_date}}</td>
                                         <td>
                                             @if($attendance->attendance_status ==0)
                                                 <p class="text-danger" style="font-weight: bolder">
                                                  {{trans('teacher_dashboard.Absent')}}
                                                 </p>
                                             @elseif($attendance->attendance_status ==1)
                                                 <p class="text-success" style="font-weight: bolder">
                                                  {{trans('teacher_dashboard.Present')}}
                                                 </p>
                                            @endif
                                         </td>
                                     </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endisset

                </div>
            </div>
            <!-- row closed -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax(
                        {
                            url: "{{URL::to('getTeacherSection')}}/" + classroom_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $('select[name="section_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="section_id"]').append
                                    ('<option value="' + key + '">' + value + '</option>')
                                })
                            }
                        }
                    );
                } else {
                    console.log('Ajax could not load');
                }
            })
        })
    </script>
@endsection
