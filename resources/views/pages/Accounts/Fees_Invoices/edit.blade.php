@extends('layouts.master')
@section('css')

@section('title')
    {{trans('fees_invoice.Edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('fees_invoice.Edit')}} - {{$invoices->Student->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color"> {{trans('fees_invoice.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active"> {{trans('fees_invoice.Edit')}}
                        - {{$invoices->Student->name}}</li>
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
                    <form method="post" action="{{route('FeesInvoice.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="student_id" style="font-size: 14px; font-weight: bolder">{{trans('fees_invoice.Student_Name')}}</label>
                                    <input type="text" disabled name="student_id" id="student_id"
                                           value="{{$invoices->Student->name}}" class="form-control">
                                    <input type="hidden" name="invoice_id" id="invoice_id" value="{{$invoices->id}}" >
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="total" style="font-size: 14px; font-weight: bolder">{{trans('fees_invoice.Total')}}</label>
                                    <select name="total" id="total" class="form-control" style="height: 5%">
                                        @foreach($fees as $fee)
                                            <option value="{{$fee->total}}"{{($fee->total == $invoices->total)?'selected':''}}>
                                                {{$fee->total}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fee_type" style="font-size: 14px; font-weight: bolder">{{trans('fees_invoice.Fee_Type')}}</label>
                                    <select name="fee_type" id="fee_type" class="form-control" style="height: 5%">
                                        @foreach($fee_types as $fee_type)
                                            <option value="{{$fee_type->id}}"{{($fee_type->id == $invoices->fee_type)?'selected':''}}>
                                                {{$fee_type->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" style="font-size: 14px; font-weight: bolder">{{trans('fees_invoice.Description')}}</label>
                                    <textarea name="description" id="description" rows="4" class="form-control">{{$invoices->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('fees_invoice.Update')}}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
