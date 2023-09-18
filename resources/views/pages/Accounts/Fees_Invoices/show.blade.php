@extends('layouts.master')
@section('css')

@section('title')
    {{trans('fees_invoice.Add_Fee_Invoice')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('fees_invoice.Add_Fee_Invoice')}} - {{$students->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color"> {{trans('fees_invoice.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active"> {{trans('fees_invoice.Add_Fee_Invoice')}}
                        - {{$students->name}}</li>
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
                    <form method="post" action="{{route('FeesInvoice.store')}}">
                        @csrf
                        <div class="repeater">
                            <div data-repeater-list="ListFees">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="student_id"
                                                       style="font-weight: bolder;font-size: 14px">{{trans('fees_invoice.Student_Name')}}</label>
                                                <select class="form-control" name="student_id" id="student_id"
                                                        style="height: 5%">
                                                    <option selected disabled>{{trans('fees_invoice.Select')}}</option>
                                                    <option value="{{$students->id}}"> {{$students->name}} </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="fee_type"
                                                       style="font-weight: bolder;font-size: 14px">{{trans('fees_invoice.Fee_Type')}}</label>
                                                <select class="form-control" name="fee_type" id="fee_type"
                                                        style="height: 5%">
                                                    <option selected disabled>{{trans('fees_invoice.Select')}}</option>
                                                    @foreach($fee_types as $fee_type)
                                                        <option value="{{$fee_type->id}}"> {{$fee_type->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-">
                                            <div class="form-group">
                                                <label for="total"
                                                       style="font-weight: bolder;font-size: 14px">{{trans('fees_invoice.Amount')}}</label>
                                                <select class="form-control" name="total" id="total"
                                                        style="height: 5%">
                                                    <option selected disabled>{{trans('fees_invoice.Select')}}</option>
                                                    @foreach($fees as $fee)
                                                        <option value="{{$fee->total}}"> {{$fee->total}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="description"
                                                       style="font-weight: bolder;font-size: 14px">{{trans('fees_invoice.Description')}}</label>
                                                <input type="text" class="form-control" name="description"
                                                       id="description" required>
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="action"
                                                       style="font-weight: bolder;font-size: 14px">{{trans('fees_invoice.Action')}}</label>
                                                <br>
                                                <button class="btn btn-danger" data-repeater-delete
                                                        style="width: 90%;height:30%;margin-top: 6%">{{trans('fees_invoice.Delete_Record')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success" data-repeater-create
                                    style="width: 15%">{{trans('fees_invoice.Add_Record')}}
                            </button>
                        </div>
                        <input type="hidden" name="grade_id" id="grade_id" value="{{$students->grade_id}}">
                        <input type="hidden" name="classroom_id" id="classroom_id" value="{{$students->classroom_id}}">
                        <br>
                        <button type="submit" class="btn btn-primary"
                                style="width: 15%">{{trans('fees_invoice.Save')}}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
