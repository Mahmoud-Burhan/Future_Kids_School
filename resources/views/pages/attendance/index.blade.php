@extends('layouts.master')
@section('css')

@section('title')
    {{trans('attendance.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('attendance.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('attendance.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('attendance.Title')}}</li>
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
                    <div class="accordion gray plus-icon circular">
                        @foreach($grades as $grade)
                            <div class="acd-group">
                                <div class="acd-group">
                                    <a href="" class="acd-heading">{{$grade->name}}</a>
                                    <div class="acd-des">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                   data-page-length="50"
                                                   style="text-align: center">
                                                <thead>
                                                    <tr class="table table-success">
                                                        <th>#</th>
                                                        <th>{{trans('attendance.Section_name')}}</th>
                                                        <th>{{trans('attendance.Class_name')}}</th>
                                                        <th>{{trans('attendance.Status')}}</th>
                                                        <th>{{trans('attendance.Action')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($grade->Sections as $list_grade)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$list_grade->section_name}}</td>
                                                            <td>{{$list_grade->Classroom->class_name}}</td>
                                                            <td>
                                                                @if($list_grade->status ==1)
                                                                    <span class="badge badge-success">
                                                                        {{trans('attendance.Active')}}
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-danger">
                                                                        {{trans('attendance.Not_Active')}}
                                                                    </span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <a href="{{route('StudentAttendance.show',$list_grade->id)}}" class="btn btn-warning btn-sm">
                                                                    {{trans('attendance.Attendance_list')}}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
@endsection
@section('js')

@endsection
