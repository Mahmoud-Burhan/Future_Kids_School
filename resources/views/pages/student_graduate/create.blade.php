@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student_graduate.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{trans('student_graduate.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('student_graduate.Dashboard')}}</a></li>
                <li class="breadcrumb-item active"> {{trans('student_graduate.Title')}}</li>
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
                <form method="post" action="{{route('StudentGraduate.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="grade_id" style="font-size: 16px;font-weight: bolder">{{trans('student_graduate.Grade')}}</label>
                                <select name="grade_id" id="grade_id" class="form-control" style="height: 5%" onchange="console.log($(this).val())">
                                    <option selected disabled>{{trans('student_graduate.Select')}}</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="classroom_id" style="font-size: 16px;font-weight: bolder">{{trans('student_graduate.Classroom')}}</label>
                                <select name="classroom_id" id="classroom_id" class="form-control" style="height: 5%" onchange="console.log($(this).val())">
                                    <option selected disabled>{{trans('student_graduate.Select')}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id" style="font-size: 16px;font-weight: bolder">{{trans('student_graduate.Section')}}</label>
                                <select name="section_id" id="section_id" class="form-control" style="height: 5%">
                                    <option selected disabled>{{trans('student_graduate.Select')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{trans('student_graduate.Save')}}</button>
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
            $('select[name="grade_id"]').on('change',function () {
                var grade_id = $(this).val();
                if(grade_id)
                {
                    $.ajax(
                        {
                            url:'{{URL::to("getClassroom")}}/'+grade_id,
                            type:'GET',
                            dataType:'json',
                            success:function (data) {
                                $('select[name="classroom_id"]').empty();
                                $.each(data,function (key,value) {
                                    $('select[name="classroom_id"]').append
                                    ('<option value="'+key+'">'+ value+ '</option>')
                                })
                            }
                        }
                    )
                }
                else
                {
                    console.log('ajax did not load');
                }
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change',function () {
                var grade_id = $(this).val();
                if(grade_id)
                {
                    $.ajax(
                        {
                            url:'{{URL::to("getSection")}}/'+grade_id,
                            type:'GET',
                            dataType:'json',
                            success:function (data) {
                                $('select[name="section_id"]').empty();
                                $.each(data,function (key,value) {
                                    $('select[name="section_id"]').append
                                    ('<option value="'+key+'">'+ value+ '</option>')
                                })
                            }
                        }
                    )
                }
                else
                {
                    console.log('ajax did not load');
                }
            })
        })
    </script>
@endsection
