@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student_promotion.Title')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  {{trans('student_promotion.Title')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> {{trans('student_promotion.Dashboard')}}</a></li>
                <li class="breadcrumb-item active"> {{trans('student_promotion.Title')}}</li>
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
                <form method="post" action="{{route('StudentPromotion.store')}}">
                    @csrf
                    <h5 style="color: red">{{trans('student_promotion.Old_Grade')}}</h5>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="grade_id" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Grade')}}</label>
                                <select class="form-control" name="grade_id" id="grade_id" style="height: 3%" onchange="console.log($(this).val())">>
                                    <option selected disabled>{{trans('student_promotion.Select')}}</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="classroom_id" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Classroom')}}</label>
                                <select class="form-control" name="classroom_id" id="classroom_id" style="height: 3%"
                                onchange="console.log($(this).val())">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Section')}}</label>
                                <select class="form-control" name="section_id" id="section_id" style="height: 3%">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Academic')}}</label>
                                <select class="form-control" name="academic_year" id="academic_year" style="height: 3%">
                                    <option selected disabled>{{trans('student_promotion.Select')}}</option>
                                    <option value="{{date('Y')}}">{{date('Y')}}</option>
                                    <option value="{{date('Y')+1}}">{{date('Y')+1}}</option>
                                    <option value="{{date('Y')+1}}">{{date('Y')+2}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <h5 style="color: red">{{trans('student_promotion.New_Grade')}}</h5>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="new_grade_id" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Grade')}}</label>
                                <select class="form-control" name="new_grade_id" id="new_grade_id" style="height: 3%" onchange="console.log($(this).val())">>
                                    <option selected disabled>{{trans('student_promotion.Select')}}</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="new_classroom_id" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Classroom')}}</label>
                                <select class="form-control" name="new_classroom_id" id="new_classroom_id" style="height: 3%"
                                        onchange="console.log($(this).val())">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="new_section_id" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Section')}}</label>
                                <select class="form-control" name="new_section_id" id="new_section_id" style="height: 3%">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="new_academic_year" style="font-weight: bolder;font-size: 14px;">{{trans('student_promotion.Academic')}}</label>
                                <select class="form-control" name="new_academic_year" id="new_academic_year" style="height: 3%">
                                    <option selected disabled>{{trans('student_promotion.Select')}}</option>
                                    <option value="{{date('Y')}}">{{date('Y')}}</option>
                                    <option value="{{date('Y')+1}}">{{date('Y')+1}}</option>
                                    <option value="{{date('Y')+2}}">{{date('Y')+2}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{trans('student_promotion.Save')}}</button>
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
                                $('select[name="classroom_id"]').append(
                                    '<option value="'+key+'">' +value+ '</option>'
                                );
                            })
                        }
                    }
                )
            }
            else
            {
                console.log('Ajax did not load');
            }
        })
    })
</script>

<script>
    $(document).ready(function () {
        $('select[name="classroom_id"]').on('change',function () {
            var classroom_id = $(this).val();
            if(classroom_id)
            {
                $.ajax(
                    {
                        url:'{{URL::to("getSection")}}/'+classroom_id,
                        type:'GET',
                        dataType:'json',
                        success:function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="section_id"]').append(
                                    '<option value="'+key+'">' +value+ '</option>'
                                );
                            })
                        }
                    }
                )
            }
            else
            {
                console.log('Ajax did not load');
            }
        })
    })
</script>

<script>
    $(document).ready(function () {
        $('select[name="new_grade_id"]').on('change',function () {
            var new_grade_id = $(this).val();
            if(new_grade_id)
            {
                $.ajax(
                    {
                        url:'{{URL::to("getNewClassroom")}}/'+new_grade_id,
                        type:'GET',
                        dataType:'json',
                        success:function (data) {
                            $('select[name="new_classroom_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="new_classroom_id"]').append(
                                    '<option value="'+key+'">' +value+ '</option>'
                                );
                            })
                        }
                    }
                )
            }
            else
            {
                console.log('Ajax did not load');
            }
        })
    })
</script>

<script>
    $(document).ready(function () {
        $('select[name="new_classroom_id"]').on('change',function () {
            var new_classroom_id = $(this).val();
            if(new_classroom_id)
            {
                $.ajax(
                    {
                        url:'{{URL::to("getNewSection")}}/'+new_classroom_id,
                        type:'GET',
                        dataType:'json',
                        success:function (data) {
                            $('select[name="new_section_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="new_section_id"]').append(
                                    '<option value="'+key+'">' +value+ '</option>'
                                );
                            })
                        }
                    }
                )
            }
            else
            {
                console.log('Ajax did not load');
            }
        })
    })
</script>
@endsection
