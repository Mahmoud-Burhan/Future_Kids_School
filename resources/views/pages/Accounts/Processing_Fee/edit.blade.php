@extends('layouts.master')
@section('css')

@section('title')
    {{trans('processing.Edit_Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{trans('processing.Edit_Title')}}-{{$processing->Student->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('processing.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{trans('processing.Edit_Title')}}-{{$processing->Student->name}}</li>
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
                    <form method="post" action="{{route('ProcessingFee.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="debit"
                                           style="font-size: 14px;font-weight: bolder">{{trans('processing.Amount')}}</label>
                                    <input type="number" name="debit" id="debit" class="form-control" step="any"
                                    value="{{$processing->debit}}">
                                    <input type="hidden" name="id" id="id" value="{{$processing->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description"
                                           style="font-size: 14px;font-weight: bolder">{{trans('processing.Description')}}</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{$processing->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('processing.Update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
