@extends('layouts.master')
@section('css')

@section('title')
    {{trans('online_classes.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('online_classes.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color">{{trans('online_classes.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('online_classes.Title')}}</li>
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
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                               style="text-align: center">
                            <thead>
                            <tr style="text-align: center" class="table table-success">
                                <th>#</th>
                                <th>{{trans('online_classes.Grade_name')}}</th>
                                <th>{{trans('online_classes.Classroom_name')}}</th>
                                <th>{{trans('online_classes.Section_name')}}</th>
                                <th>{{trans('online_classes.Teacher_name')}}</th>
                                <th>{{trans('online_classes.Topic')}}</th>
                                <th>{{trans('online_classes.Start_At')}}</th>
                                <th>{{trans('online_classes.Duration')}}</th>
                                <th>{{trans('online_classes.Link')}}</th>
                                <th>{{trans('online_classes.Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($online_classes as $online_class)
                                <tr style="text-align: center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$online_class->Grades->name}}</td>
                                    <td>{{$online_class->Classroom->class_name}}</td>
                                    <td>{{$online_class->Section->section_name}}</td>
                                    <td>{{$online_class->created_by}}</td>
                                    <td>{{$online_class->topic}}</td>
                                    <td>{{$online_class->start_time}}</td>
                                    <td>{{$online_class->duration}}</td>
                                    <td class="text-primary"><a href="{{$online_class->join_url}}" target="_blank">{{trans('online_classes.Join')}}</a></td>
                                    <td>
                                        <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                               data-effect="effect-scale" data-target="#DeleteModal{{$online_class->meeting_id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('online_classes.Delete')}}
                                        </a>
                                    </td>
                                </tr>
                                @include("pages.online_classes.DeleteModal")
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('OnlineClasses.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        {{trans('online_classes.Add_New_Class')}}
                    </a>
                    &nbsp;
                    <a href="{{route('Indirect.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        {{trans('online_classes.Add_Indirect_New_Class')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
