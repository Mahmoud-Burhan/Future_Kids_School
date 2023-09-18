@extends('layouts.master')

@section('css')
@section('title')
    {{trans('teacher_dashboard.Sections')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('teacher_dashboard.Sections')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color">{{trans('section.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('teacher_dashboard.Sections')}}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table table-success">
                                <th>#</th>
                                <th>{{trans('teacher_dashboard.Grade_name')}}</th>
                                <th>{{trans('teacher_dashboard.Class_name')}}</th>
                                <th>{{trans('teacher_dashboard.Section_name')}}</th>
                                <th>{{trans('teacher_dashboard.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                    <tr style="text-align: center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$section->Grades->name}}</td>
                                        <td>{{$section->Classroom->class_name}}</td>
                                        <td>{{$section->section_name}}</td>
                                        <td>
                                            <a href="{{route('student_attendance',[$section->grade_id,$section->classroom_id,$section->id])}}"  class="btn btn-outline-info" target="_blank">
                                                <span class="fa fa-list"></span>
                                                {{trans('teacher_dashboard.Details')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a href="{{route('Subject.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        {{trans('subject.Add_Subject')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->



@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
