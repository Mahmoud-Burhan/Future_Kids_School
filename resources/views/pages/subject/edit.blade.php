@extends('layouts.master')
@section('css')

@section('title')
    {{trans('subject.Title_Edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('subject.Title_Edit')}} - {{$subject->name}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('subject.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{trans('subject.Title_Edit')}} - {{$subject->name}}</li>
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
                    <form action="{{route('Subject.update','test')}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_ar"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('subject.Name_ar')}}</label>
                                    <input type="text" class="form-control" name="name_ar" id="name_ar" required
                                           autocomplete="off" value="{{$subject->getTranslation('name','ar')}}">
                                    <input type="hidden" id="id" name="id" value="{{$subject->id}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_en"
                                           style="text-align: center; font-weight: bolder;font-size: 14px;">{{trans('subject.Name_en')}}</label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" required
                                           autocomplete="off" value="{{$subject->getTranslation('name','en')}}">
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
                                            <option value="{{$grade->id}}" {{($grade->id == $subject->grade_id)?'selected':''}}>
                                                {{$grade->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class_id">{{trans('subject.Classroom_name')}}</label>
                                    <select name="classroom_id" id="classroom_id" class="form-control" style="height: 10%">
                                        <option value="{{$subject->classroom_id}}">
                                            {{$subject->Classroom->class_name}}
                                        </option>
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
                                            <option value="{{$teacher->id}}" {{($teacher->id == $subject->teacher_id)?'selected':''}}>
                                                {{$teacher->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('subject.Update')}}</button>
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
