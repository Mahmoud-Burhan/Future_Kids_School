@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student_graduate.Student_Graduate_List')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('student_graduate.Student_Graduate_List')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('student_graduate.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{trans('student_graduate.Student_Graduate_List')}}</li>
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
                                <th>{{trans('student_graduate.Student_Name')}}</th>
                                <th>{{trans('student_graduate.Email')}}</th>
                                <th>{{trans('student_graduate.Gender')}}</th>
                                <th>{{trans('student_graduate.Grade')}}</th>
                                <th>{{trans('student_graduate.Classroom')}}</th>
                                <th>{{trans('student_graduate.Section')}}</th>
                                <th>{{trans('student_graduate.Action')}}</th>
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
                                       <button class="modal-effect btn btn-outline-success btn-sm" data-effect="effect-scale"
                                               data-toggle="modal" data-target="#graduateReturn{{$student->id}}">
                                           {{trans('student_graduate.Return_Student')}}
                                       </button>

                                       <button class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                               data-toggle="modal" data-target="#deleteGraduate{{$student->id}}">
                                           {{trans('student_graduate.Delete_Student')}}
                                       </button>
                                   </td>
                                </tr>
                                @include('pages.student_graduate.graduateReturn')
                                @include('pages.student_graduate.deleteGraduate')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
