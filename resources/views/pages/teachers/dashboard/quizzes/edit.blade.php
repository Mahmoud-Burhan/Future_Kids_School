@extends('layouts.master')
@section('css')

@section('title')
    {{trans('quiz.Title_Edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{trans('quiz.Title_Edit')}} - {{$quiz->name}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('quiz.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active"> {{trans('quiz.Title_Edit')}} - {{$quiz->name}}</li>
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
                    <form method="post" action="{{route('teacherQuiz.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_ar"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('quiz.Name_ar')}}</label>
                                    <input type="text" name="name_ar" id="name_ar" class="form-control" required
                                           value="{{$quiz->getTranslation('name','ar')}}">
                                    <input type="hidden" name="id" id="id" value="{{$quiz->id}}">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_en"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('quiz.Name_en')}}</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control" required
                                           value="{{$quiz->getTranslation('name','en')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="subject_id"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('quiz.Subject_name')}}</label>
                                    <select name="subject_id" id="subject_id" class="form-control" style="height: 5%">
                                        <option selected disabled>{{trans('quiz.Select')}}</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}" {{ ($subject->id == $quiz->subject_id)?'selected':''}}>
                                                {{$subject->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="grade_id"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('quiz.Grade_name')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control"
                                            onchange="console.log($(this).val())" style="height: 5%">
                                        <option selected disabled >{{trans('quiz.Select')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">
                                                {{$grade->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="classroom_id"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('quiz.Classroom_name')}}</label>
                                    <select name="classroom_id" id="classroom_id" class="form-control"
                                            onchange="console.log($(this).val())" style="height: 5%">
                                        <option selected disabled>{{trans('quiz.Select')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="section_id"
                                           style="font-weight: bolder;font-size: 14px;">{{trans('quiz.Section_name')}}</label>
                                    <select name="section_id" id="section_id" class="form-control"
                                            onchange="console.log($(this).val())" style="height: 5%">
                                        <option selected disabled>{{trans('quiz.Select')}}</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('quiz.Update')}}</button>
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
                            url: "{{URL::to('getTeacherClasses')}}/" + grade_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $('select[name="classroom_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="classroom_id"]').append
                                    ('<option value="' + key + '">' + value + '</option>')
                                })
                            }
                        }
                    );
                } else {
                    console.log('Ajax could not load');
                }
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax(
                        {
                            url: "{{URL::to('getTeacherSection')}}/" + classroom_id,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $('select[name="section_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="section_id"]').append
                                    ('<option value="' + key + '">' + value + '</option>')
                                })
                            }
                        }
                    );
                } else {
                    console.log('Ajax could not load');
                }
            })
        })
    </script>
@endsection
