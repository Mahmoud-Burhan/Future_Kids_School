@extends('layouts.master')
@section('css')

@section('title')
    {{trans('subject.Add_Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('subject.Add_Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('subject.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">    {{trans('subject.Add_Title')}}</li>
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
                    <form action="{{route('Subject.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_ar"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('subject.Name_ar')}}</label>
                                    <input type="text" class="form-control" name="name_ar" id="name_ar" required
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_en"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('subject.Name_en')}}</label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" required
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="grade_id"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('subject.Grade_name')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control" style="height: 10%"
                                            onchange="console.log($(this).val())">>
                                        <option disabled selected>{{trans('subject.Select')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="classroom_id">{{trans('subject.Classroom_name')}}</label>
                                    <select name="classroom_id" id="classroom_id" class="form-control" style="height: 10%">
                                        <option disabled selected>{{trans('subject.Select')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_id"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('subject.Teacher_name')}}</label>
                                    <select name="teacher_id" id="teacher_id" class="form-control" style="height: 5%">
                                        <option disabled selected>{{trans('subject.Select')}}</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">{{trans('Subject.Save')}}</button>
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
                                url: '{{URL::to('getClasses')}}/' + grade_id,
                                type: 'get',
                                dataType: 'json',
                                success: function (data) {
                                    $('select[name="classroom_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="classroom_id"]').append(
                                            '<option value="' + key + '">' + value + '</option>'
                                        );
                                    })
                                }
                            })
                    } else {
                        console.log('AJAX load did not work');
                    }

                }
            )
        })
    </script>
@endsection
