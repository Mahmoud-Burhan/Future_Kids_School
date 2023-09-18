@extends('layouts.master')
@section('css')

@section('title')
    {{trans('Account.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">   {{trans('Account.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">  {{trans('Account.Dashboard')}}</a></li>
                <li class="breadcrumb-item active">  {{trans('Account.Title')}}</li>
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
                            <th width="5%">#</th>
                            <th width="5%">{{trans('Account.Title_name')}}</th>
                            <th width="5%">{{trans('Account.Grade')}}</th>
                            <th width="5%">{{trans('Account.Classroom')}}</th>
                            <th width="5%">{{trans('Account.Fee_Type')}}</th>
                            <th width="5%">{{trans('Account.Amount')}}</th>
                            <th width="10%">{{trans('Account.Vat')}}</th>
                            <th width="20%">{{trans('Account.Total')}}</th>
                            <th width="5%">{{trans('Account.Academic')}}</th>
                            <th width="15%">{{trans('Account.Comment')}}</th>
                            <th width="25%">{{trans('Account.Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fees as $fee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$fee->title}}</td>
                                <td>{{$fee->Grade->name}}</td>
                                <td>{{$fee->Classroom->class_name}}</td>
                                <td>{{$fee->FeesType->name}}</td>
                                <td>{{$fee->amount}}</td>
                                <td>{{$fee->vat}}%</td>
                                <td>{{$fee->total}}</td>
                                <td>{{$fee->academic_year}}</td>
                                <td>{{$fee->description}}</td>
                                <td>
                                    <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                        {{trans('Account.Edit')}}
                                    </a>

                                    <a  class="btn btn-outline-danger btn-sm" data-target="#modalDemo2{{$fee->id}}"
                                    data-toggle="modal">
                                        <i  style="color:red;" class="fa fa-trash"></i>
                                        {{trans('Account.Delete')}}
                                    </a>
                                </td>
                            </tr>
                            @include('pages.Accounts.Fees.delete_modal')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <a href="{{route('Fees.create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    {{trans('Account.Add_Fee')}}
                </a>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
