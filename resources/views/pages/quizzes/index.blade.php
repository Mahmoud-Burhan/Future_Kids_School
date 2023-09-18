@extends('layouts.master')
@section('css')

@section('title')
    {{trans('quiz.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('quiz.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('quiz.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('quiz.Title')}}</li>
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
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                            <tr class="table table-success" style="font-weight: bolder;font-size: 14px;">
                                <td>#</td>
                                <td>{{trans('quiz.Exam_Name')}}</td>
                                <td>{{trans('quiz.Teacher_name')}}</td>
                                <td>{{trans('quiz.Grade_name')}}</td>
                                <td>{{trans('quiz.Classroom_name')}}</td>
                                <td>{{trans('quiz.Section_name')}}</td>
                                <td>{{trans('quiz.Action')}}</td>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$quiz->name}}</td>
                                <td>{{$quiz->Teacher->name}}</td>
                                <td>{{$quiz->Grade->name}}</td>
                                <td>{{$quiz->Classroom->class_name}}</td>
                                <td>{{$quiz->Section->section_name}}</td>
                                <td>
                                    <a href="{{route('Quizzes.edit',$quiz->id)}}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                        {{trans('quiz.Edit')}}
                                    </a>
                                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{$quiz->id}}">
                                        <i class="fa fa-trash"></i>
                                        {{trans('quiz.Delete')}}
                                    </button>
                                </td>
                            </tr>
                            @include('pages.quizzes.deleteModal')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{route('Quizzes.create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    {{trans('quiz.Add_Quiz')}}
                </a>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
