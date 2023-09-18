@extends('layouts.master')
@section('css')

@section('title')
    {{trans('receipt.Edit_Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('receipt.Edit_Title')}} - {{$receipt->Student->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('receipt.Dashboard')}} </a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('receipt.Edit_Title')}}- {{$receipt->Student->name}}</li>
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
                    <form method="post" action="{{route('ReceiptStudent.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payment_type"
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Payment_Type')}}</label>
                                    <select class="form-control" name="payment_type" id="payment_type"
                                            style="height: 5%">
                                        <option disabled selected>{{trans('receipt.Select')}}</option>
                                        @foreach($payments as $payment)
                                            <option value="{{$payment->id}}"{{($payment->id == $receipt->payment_type)?'selected':''}}>
                                                {{$payment->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="debit"
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Amount_Received')}}</label>
                                    <input type="number" name="debit" id="debit" class="form-control" step="any" value="{{$receipt->debit}}">
                                    <input type="hidden" name="receipt_id" id="receipt_id" value="{{$receipt->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description"
                                           style="font-size: 14px;font-weight: bolder">{{trans('receipt.Description')}}</label>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control"> {{$receipt->description}} </textarea>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('receipt.Update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
