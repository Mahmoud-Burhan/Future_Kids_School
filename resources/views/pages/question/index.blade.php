@extends('layouts.master')
@section('css')

@section('title')
    {{trans('question.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('question.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('question.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('question.Title')}}</li>
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
                    <form>
                        @csrf
                        <div class="table-responsive">
                            <table id="datatable" class="table table-hover table-sm table-bordered p-0">
                                <thead style="text-align: center">
                                <tr class="table table-success" style="font-weight: bolder;font-size: 14px">
                                    <th>#</th>
                                    <th>{{trans('question.Question')}}</th>
                                    <th>{{trans('question.Answer')}}</th>
                                    <th>{{trans('question.Right_Answer')}}</th>
                                    <th>{{trans('question.Points')}}</th>
                                    <th>{{trans('question.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr style="text-align: center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$question->title}}</td>
                                        <td>{{$question->answers}}</td>
                                        <td>{{$question->right_answers}}</td>
                                        <td>{{$question->points}}</td>
                                        <td>
                                            <a href="{{route('Question.edit',$question->id)}}" class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                                {{trans('question.Edit')}}
                                            </a>

                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{$question->id}}">
                                                <i class="fa fa-trash"></i>
                                                {{trans('question.Delete')}}
                                            </button>
                                        </td>
                                    </tr>
                                    @include('pages.question.deleteModal')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('Question.create')}}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            {{trans('question.Add_Question')}}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
