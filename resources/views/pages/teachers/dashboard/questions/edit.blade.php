@extends('layouts.master')
@section('css')

@section('title')
    {{trans('question.Title_Edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{trans('question.Title_Edit')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('question.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{trans('question.Title_Edit')}}</li>
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
                    <form method="post" action="{{route('teacherQuestion.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('question.Question_name')}}</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                           value="{{$questions->title}}" required>
                                    <input type="hidden" name="id" id="id" value="{{$questions->id}}">
                                    <input type="hidden" name="quiz_id" id="quiz_id" value="{{$questions->quiz_id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="answers"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('question.Answer')}}</label>
                                    <textarea name="answers" id="answers" class="form-control" rows="4">
                                        {{$questions->answers}}
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="right_answers"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('question.Right_Answer')}}</label>
                                    <input type="text" name="right_answers" id="right_answers" class="form-control"
                                           value="{{$questions->right_answers}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="points"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('question.Points')}}</label>
                                    <input type="number" name="points" id="points" class="form-control" step="any"
                                           value="{{$questions->points}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">{{trans('question.Update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
