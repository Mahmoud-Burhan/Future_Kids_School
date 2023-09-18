@extends('layouts.master')
@section('css')

@section('title')
    {{trans('subject.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{trans('subject.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('subject.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active"> {{trans('subject.Title')}}</li>
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
                                <th>{{trans('subject.Subject_name')}}</th>
                                <th>{{trans('subject.Grade_name')}}</th>
                                <th>{{trans('subject.Classroom_name')}}</th>
                                <th>{{trans('subject.Teacher_name')}}</th>
                                <th>{{trans('subject.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->Grade->name}}</td>
                                    <td>{{$subject->Classroom->class_name}}</td>
                                    <td>{{$subject->Teacher->name}}</td>
                                    <td>
                                        <a href="{{route('Subject.edit',$subject->id)}}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            {{trans('subject.Edit')}}
                                        </a>

                                        <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                           data-effect="effect-scale" data-target="#DeleteModal{{$subject->id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('subject.Delete')}}
                                        </a>
                                    </td>
                                </tr>
                                @include('pages.subject.DeleteModal')
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

@endsection
