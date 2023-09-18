@extends('layouts.master')
@section('css')

@section('title')
    {{trans('receipt.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('receipt.Title')}} {{$accounts->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('receipt.Dashboard')}} </a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('receipt.Title')}}  {{$accounts->name}}</li>
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
                    <form method="post" action="{{route('ReceiptStudent.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="payment_type"
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Payment_Type')}}</label>
                                    <select class="form-control" name="payment_type" id="payment_type"
                                            style="height: 5%">
                                        <option disabled selected>{{trans('receipt.Select')}}</option>
                                        @foreach($payments as $payment)
                                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Amount_Required')}}</label>
                                    <input type="number" name="" id="" class="form-control" value="{{$debits - $credits}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="debit"
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Amount_Received')}}</label>
                                    <input type="number" name="debit" id="debit" class="form-control" step="any">
                                    <input type="hidden" name="student_id" id="student_id" value="{{$accounts->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description"
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Description')}}</label>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control"> </textarea>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('receipt.Save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
