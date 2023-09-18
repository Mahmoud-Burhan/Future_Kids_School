@extends('layouts.master')
@section('css')

@section('title')
    {{trans('processing.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">    {{trans('processing.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">   {{trans('processing.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">   {{trans('processing.Title')}}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table table-success">
                                <th width="5%">#</th>
                                <th>{{trans('processing.Student_Name')}}</th>
                                <th>{{trans('processing.Amount')}}</th>
                                <th>{{trans('processing.Description')}}</th>
                                <th>{{trans('processing.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($processing as $process)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$process->Student->name}}</td>
                                    <td>{{$process->debit}}</td>
                                    <td>{{$process->description}}</td>
                                    <td>
                                        <a href="{{route('ProcessingFee.edit',$process->id)}}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            {{trans('processing.Edit')}}
                                        </a>

                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{$process->id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('processing.Delete')}}
                                        </button>
                                    </td>
                                </tr>
                                @include('pages.Accounts.Processing_Fee.delete_modal')
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
