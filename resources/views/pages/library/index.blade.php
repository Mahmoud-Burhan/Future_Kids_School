@extends('layouts.master')
@section('css')

@section('title')
    {{trans('library.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">   {{trans('library.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">  {{trans('library.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">  {{trans('library.Title')}}</li>
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
                    data-page-length="50" style="text-align: center">
                      <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{trans('library.Book_Name')}}</th>
                            <th>{{trans('library.Teacher_Name')}}</th>
                            <th>{{trans('library.Grade_Name')}}</th>
                            <th>{{trans('library.Class_Name')}}</th>
                            <th>{{trans('library.Section_Name')}}</th>
                            <th>{{trans('library.Action')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($libraries as $library)
                            <tr style="text-align: center">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$library->title}}</td>
                                <td>{{$library->Teacher->name}}</td>
                                <td>{{$library->Grades->name}}</td>
                                <td>{{$library->Classroom->class_name}}</td>
                                <td>{{$library->Section->section_name}}</td>
                                <td>
                                    <a href="{{route('Library.edit',$library->id)}}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                        {{trans('library.Edit')}}
                                    </a>


                                    <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                       data-effect="effect-scale" data-target="#DeleteModal{{$library->id}}">
                                        <i class="fa fa-trash"></i>
                                        {{trans('library.Delete')}}
                                    </a>

                                    <a href="{{route('download_attachment',[$library->id,$library->file_name])}}" class="btn btn-outline-warning btn-sm">
                                        <i class="fa fa-download"></i>
                                        {{trans('library.Download')}}
                                    </a>

                                    <a href="{{route('display_attachment',[$library->id,$library->file_name])}}" class="btn btn-outline-info btn-sm"
                                        target="_blank">
                                        <i class="fa fa-eye"></i>
                                        {{trans('library.Display')}}
                                    </a>
                                </td>
                            </tr>
                            @include("pages.library.DeleteModal")
                      @endforeach
                      </tbody>
                  </table>
              </div>
                <a href="{{route('Library.create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    {{trans('library.Add_New_Book')}}
                </a>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
