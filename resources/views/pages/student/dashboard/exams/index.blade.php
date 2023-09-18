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
                                <td>{{trans('quiz.Subject_name')}}</td>
                                <td>{{trans('quiz.Exam_Name')}}</td>
                                <td>{{trans('quiz.Enter_Points')}}</td>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$quiz->Subject->name}}</td>
                                <td>{{$quiz->name}}</td>
                                <td>
                                    @if($quiz->degrees->count() > 0 && $quiz->id == $quiz->degrees[0]->quizzes_id)
                                        {{$quiz->degrees[0]->score}}
                                    @else
                                        <a href="{{route('Student_Exams.show',$quiz->id)}}"
                                           class="btn btn-outline-success btn-sm" role="button"
                                           aria-pressed="true" onclick="alertAbuse()">
                                            <i class="fas fa-person-booth"></i></a>
                                    @endif

                                </td>

                            </tr>
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
