@extends('layouts.master')
@section('css')

@section('title')
    {{trans('fees_invoice.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{trans('fees_invoice.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color"> {{trans('fees_invoice.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active"> {{trans('fees_invoice.Title')}}</li>
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
                                <th>{{trans('fees_invoice.Student_Name')}}</th>
                                <th>{{trans('fees_invoice.Fee_Type')}}</th>
                                <th>{{trans('fees_invoice.Total')}}</th>
                                <th>{{trans('fees_invoice.Grade')}}</th>
                                <th>{{trans('fees_invoice.Classroom')}}</th>
                                <th>{{trans('fees_invoice.Description')}}</th>
                                <th>{{trans('fees_invoice.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fees_invoice as $fee_invoice)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$fee_invoice->Student->name}}</td>
                                    <td>{{$fee_invoice->FeesType->name}}</td>
                                    <td>{{$fee_invoice->total}}</td>
                                    <td>{{$fee_invoice->Grade->name}}</td>
                                    <td>{{$fee_invoice->Classroom->class_name}}</td>
                                    <td>{{$fee_invoice->description}}</td>
                                    <td>
                                        <a href="{{route('FeesInvoice.edit',$fee_invoice->id)}}" class="btn btn-outline-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            {{trans('fees_invoice.Edit')}}
                                        </a>

                                        <button type="button" class="btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                            data-toggle="modal" data-target="#deleteModal{{$fee_invoice->id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('fees_invoice.Delete')}}
                                        </button>
                                    </td>
                                </tr>
                                @include('pages.Accounts.Fees_Invoices.delete_modal')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
