@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student_promotion.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('student_promotion.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color">{{trans('student_promotion.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('student_promotion.Title')}}</li>
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
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="table-primary" style="width: 5%">{{trans('student_promotion.Student_Name')}}</th>
                            <th class="table-danger">{{trans('student_promotion.Old_Grade')}}</th>
                            <th class="table-danger">{{trans('student_promotion.Old_Classroom')}}</th>
                            <th class="table-danger">{{trans('student_promotion.Old_Section')}}</th>
                            <th class="table-danger">{{trans('student_promotion.Old_Academic')}}</th>
                            <th class="table-success">{{trans('student_promotion.Current_Grade')}}</th>
                            <th class="table-success">{{trans('student_promotion.Current_Classroom')}}</th>
                            <th class="table-success">{{trans('student_promotion.Current_Section')}}</th>
                            <th class="table-success">{{trans('student_promotion.Current_Academic')}}</th>
                            <th class="table-success">{{trans('student_promotion.Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promotions as $promotion)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$promotion->student->name}}</td>
                                <td>{{$promotion->Grade->name}}</td>
                                <td>{{$promotion->Classroom->class_name}}</td>
                                <td>{{$promotion->Section->section_name}}</td>
                                <td>{{$promotion->from_academic_year}}</td>
                                <td>{{$promotion->NewGrade->name}}</td>
                                <td>{{$promotion->NewClassroom->class_name}}</td>
                                <td>{{$promotion->NewSection->section_name}}</td>
                                <td>{{$promotion->to_academic_year}}</td>
                                <td>
                                    <button class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                            data-toggle="modal" data-target="#returnModal{{$promotion->id}}">
                                        {{trans('student_promotion.Return_Student')}}
                                    </button>

                                </td>
                            </tr>
                            @include('pages.student_promotion.return_modal')
                        @endforeach
                        </tbody>
                    </table>
                    <button class="modal-effect btn btn-danger" data-effect="effect-scale"
                            data-toggle="modal" data-target="#returnAllModal">
                        {{trans('student_promotion.Return_All')}}
                    </button>

                    @include('pages.student_promotion.return_all_modal')
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
