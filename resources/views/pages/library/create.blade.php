@extends('layouts.master')
@section('css')

@section('title')
    {{trans('library.Add_New_Book')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('library.Add_New_Book')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('library.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('library.Add_New_Book')}}</li>
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
                    <form method="post" action="{{route('Library.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title"
                                           style="font-weight: bolder;font-size: 14px">{{trans('library.Book_Name')}}</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="grade_id"
                                           style="font-weight: bolder;font-size: 14px">{{trans('library.Grade_Name')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control" style="height: 4%;"
                                            onchange="console.log($(this).val())" required>
                                        <option disabled selected>{{trans('library.Select')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="classroom_id"
                                           style="font-weight: bolder;font-size: 14px">{{trans('library.Class_Name')}}</label>
                                    <select name="classroom_id" id="classroom_id" class="form-control"
                                            style="height: 4%;"
                                            onchange="console.log($(this).val())" required>
                                        <option disabled selected>{{trans('library.Select')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="section_id"
                                           style="font-weight: bolder;font-size: 14px">{{trans('library.Section_Name')}}</label>
                                    <select name="section_id" id="section_id" class="form-control" style="height: 4%;"
                                            required>
                                        <option disabled selected>{{trans('library.Select')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="teacher_id"
                                           style="font-weight: bolder;font-size: 14px">{{trans('library.Teacher_Name')}}</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control" style="height: 4%;"
                                            required>
                                        <option disabled selected>{{trans('library.Select')}}</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-4">
                                <label for="section_id"
                                       style="font-weight: bolder;font-size: 14px;color: red" >{{trans('library.Attachments')}}*</label>
                                <br>
                               <input type="file" name="file_name" id="file_name" accept="application/pdf" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success">{{trans('library.Save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax(
                        {
                            url: '{{URL::to('getClassroom')}}/' + grade_id,
                            type: 'get',
                            dataType: 'json',
                            success: function (data) {
                                $('select[name="classroom_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="classroom_id"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    )
                                })
                            }
                        }
                    )
                } else {
                    console.log("Ajax didn't run")
                }
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax(
                        {
                            url: '{{URL::to('getSections')}}/' + grade_id,
                            type: 'get',
                            dataType: 'json',
                            success: function (data) {
                                $('select[name="section_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="section_id"]').append(
                                        '<option value="' + key + '">' + value + '</option>'
                                    )
                                })
                            }
                        }
                    )
                } else {
                    console.log("Ajax didn't run")
                }
            })
        })
    </script>
@endsection
