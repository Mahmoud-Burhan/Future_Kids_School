@extends('layouts.master')
@section('css')

@section('title')
    {{trans('online_classes.Add_Indirect_New_Class')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('online_classes.Add_Indirect_New_Class')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('online_classes.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('online_classes.Add_Indirect_New_Class')}}</li>
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
                    <form method="post" action="{{route('Indirect.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="grade_id" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Grade_name')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control" style="height: 4%;"
                                        onchange="console.log($(this).val())" required>
                                        <option disabled selected>{{trans('online_classes.Select')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="classroom_id" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Classroom_name')}}</label>
                                    <select name="classroom_id" id="classroom_id" class="form-control" style="height: 4%;"
                                            onchange="console.log($(this).val())" required>
                                        <option disabled selected>{{trans('online_classes.Select')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="section_id" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Section_name')}}</label>
                                    <select name="section_id" id="section_id" class="form-control" style="height: 4%;" required>
                                        <option disabled selected>{{trans('online_classes.Select')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="meeting_id" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Meeting_Id')}}</label>
                                   <input type="text" name="meeting_id" id="meeting_id" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="topic" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Topic')}}</label>
                                    <input type="text" name="topic" id="topic" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="start_time" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Start_At')}}</label>
                                    <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="duration" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Duration')}}</label>
                                    <input type="number" name="duration" id="duration" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="password" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Password')}}</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_url" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Start_Url')}}</label>
                                    <input type="text" name="start_url" id="start_url" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="join_url" style="font-weight: bolder;font-size: 14px">{{trans('online_classes.Join_Url')}}</label>
                                    <input type="text" name="join_url" id="join_url" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">{{trans('online_classes.Save')}}</button>
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
                            url:'{{URL::to('getClassroom')}}/' + grade_id,
                            type:'get',
                            dataType:'json',
                            success:function (data) {
                                $('select[name="classroom_id"]').empty();
                                $.each(data,function (key,value) {
                                    $('select[name="classroom_id"]').append(
                                        '<option value="'+key+'">'+value+'</option>'
                                    )
                                })
                            }
                        }
                    )
                }
                else
                {
                    console.log("Ajax didn't run")
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
                            url:'{{URL::to('getSections')}}/' + grade_id,
                            type:'get',
                            dataType:'json',
                            success:function (data) {
                                $('select[name="section_id"]').empty();
                                $.each(data,function (key,value) {
                                    $('select[name="section_id"]').append(
                                        '<option value="'+key+'">'+value+'</option>'
                                    )
                                })
                            }
                        }
                    )
                }
                else
                {
                    console.log("Ajax didn't run")
                }
            })
        })
    </script>
@endsection
