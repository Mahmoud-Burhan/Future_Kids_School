@extends('layouts.master')
@section('css')

@section('title')
    {{trans('payment.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">    {{trans('payment.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">   {{trans('payment.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">   {{trans('payment.Title')}}</li>
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
                                <th>{{trans('payment.Student_Name')}}</th>
                                <th>{{trans('payment.Amount')}}</th>
                                <th>{{trans('payment.Description')}}</th>
                                <th>{{trans('payment.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$payment->Student->name}}</td>
                                    <td>{{$payment->debit}}</td>
                                    <td>{{$payment->description}}</td>
                                    <td>
                                        <a href="{{route('PaymentFee.edit',$payment->id)}}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            {{trans('payment.Edit')}}
                                        </a>

                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{$payment->id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('payment.Delete')}}
                                        </button>
                                    </td>
                                </tr>
                                @include('pages.Accounts.Payment_Fee.delete_modal')
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
