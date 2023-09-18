@extends('layouts.master')
@section('css')

@section('title')
    {{trans('payment.Edit_Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{trans('payment.Edit_Title')}}-{{$payments->Student->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('payment.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{trans('payment.Edit_Title')}}-{{$payments->Student->name}}</li>
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
                    <form method="post" action="{{route('PaymentFee.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="debit"
                                           style="font-size: 14px;font-weight: bolder">{{trans('payment.Amount')}}</label>
                                    <input type="number" name="debit" id="debit" class="form-control" step="any"
                                           value="{{$payments->debit}}">
                                    <input type="hidden" name="payment_id" id="payment_id" value="{{$payments->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description"
                                           style="font-size: 14px;font-weight: bolder">{{trans('payment.Description')}}</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">
                                        {{$payments->description}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('payment.Update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
