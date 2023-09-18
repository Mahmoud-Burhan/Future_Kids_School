@extends('layouts.master')
@section('css')
    @livewireStyles
@section('title')
    {{trans('question.Exam')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('quiz.Exam')}} - {{$questions->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('question.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('quiz.Exam')}} - {{$questions->name}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
    @livewire('show-question', ['quiz_id' => $quiz_id, 'student_id' => $student_id])
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection
