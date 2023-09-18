@extends('layouts.master')
@section('css')

@section('title')
    {{trans('receipt.Index_Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">    {{trans('receipt.Index_Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">   {{trans('receipt.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">   {{trans('receipt.Index_Title')}}</li>
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
                                <th>{{trans('receipt.Student_Name')}}</th>
                                <th>{{trans('receipt.Amount')}}</th>
                                <th>{{trans('receipt.Description')}}</th>
                                <th>{{trans('receipt.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receipts as $receipt)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$receipt->Student->name}}</td>
                                <td>{{$receipt->debit}}</td>
                                <td>{{$receipt->description}}</td>

                                <td>
                                    <a href="{{route('ReceiptStudent.edit',$receipt->id)}}"
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                        {{trans('receipt.Edit')}}
                                    </a>

                                    <button class="btn btn-outline-danger btn-sm"
                                            data-effec="effect-scale" data-target="#DeleteModal{{$receipt->id}}" data-toggle="modal"
                                            <i class="fa fa-trash"></i>
                                    {{trans('receipt.Delete')}}
                                </td>
                            </tr>
                                @include('pages.Accounts.Receipt.DeleteModal')
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
