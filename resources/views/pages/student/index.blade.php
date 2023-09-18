@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('student.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('student.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('student.Title')}}</li>
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
                                <th>{{trans('student.Student_name')}}</th>
                                <th>{{trans('student.Email')}}</th>
                                <th>{{trans('student.Gender')}}</th>
                                <th>{{trans('student.Grade')}}</th>
                                <th>{{trans('student.Section')}}</th>
                                <th>{{trans('student.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($students as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->Gender->name}}</td>
                                    <td>{{$student->Grades->name}}</td>
                                    <td>{{$student->Section->section_name}}</td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                العمليات
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('Student.edit',$student->id)}}">
                                                    <i style="color: blue" class="fa fa-edit "></i>
                                                    &nbsp;  {{trans('student.Edit_Student')}}
                                                </a>
                                                <a class="dropdown-item" href="{{route('Student.show',$student->id)}}">
                                                    <i style="color:greenyellow" class="fa fa-eye">
                                                    </i>
                                                    &nbsp; {{trans('student.Student_Details')}}
                                                </a>

                                                <a class="dropdown-item" data-target="#graduateStudent{{$student->id}}" data-toggle="modal" href="">
                                                    <i style="color: black" class="fa fa-graduation-cap">

                                                    </i>&nbsp;    {{trans('student.Graduate_Student')}}
                                                </a>


                                                <a class="dropdown-item" href="{{route('FeesInvoice.show',$student->id)}}">
                                                    <i style="color:darkorange" class="fa fa-file">
                                                    </i>
                                                    &nbsp; {{trans('fees_invoice.Add_Fee_Invoice')}}
                                                </a>



                                                <a class="dropdown-item" href="{{route('ReceiptStudent.show',$student->id)}}">
                                                    <i style="color: dodgerblue" class="fa fa-file-text-o">
                                                    </i>
                                                    &nbsp; {{trans('receipt.Title')}}
                                                </a>

                                                <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}">
                                                    <i style="color:steelblue" class="fa fa-spinner">
                                                    </i>
                                                    &nbsp; {{trans('processing.Processing_Invoice')}}
                                                </a>

                                                <a class="dropdown-item" href="{{route('PaymentFee.show',$student->id)}}">
                                                    <i style="color:yellow" class="fa fa-dollar">
                                                    </i>
                                                    &nbsp; {{trans('payment.Side_Title')}}
                                                </a>


                                                <a class="dropdown-item" data-target="#modalDemo2{{$student->id}}" data-toggle="modal" href="">
                                                    <i style="color: red" class="fa fa-trash">

                                                    </i>&nbsp;  {{trans('student.Delete_Student')}}
                                                </a>


                                              {{--  <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}">
                                                    <i style="color: #9dc8e2" class="fas fa-money-bill-alt">

                                                    </i>&nbsp; &nbsp;سند قبض
                                                </a>
                                                <a class="dropdown-item" href="{{route('ProcessingFee.show',$student->id)}}">
                                                    <i style="color: #9dc8e2" class="fas fa-money-bill-alt">
                                                    </i>&nbsp; &nbsp;
                                                    استبعاد رسوم</a>
                                                <a class="dropdown-item" href="{{route('Payment_students.show',$student->id)}}">
                                                    <i style="color:goldenrod" class="fas fa-donate">
                                                    </i>&nbsp; &nbsp;سند صرف
                                                </a>--}}

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.student.delete_modal')
                                @include('pages.student.graduate_student_modal')
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="{{route('Student.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        {{trans('student.Add_Student')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
