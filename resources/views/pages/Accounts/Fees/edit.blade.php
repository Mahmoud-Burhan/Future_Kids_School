@extends('layouts.master')
@section('css')

@section('title')
    {{trans('Account.Edit_Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">    {{trans('Account.Edit_Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">   {{trans('Account.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">   {{trans('Account.Edit_Title')}}</li>
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
                    <form method="post" action="{{route('Fees.update','test')}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="title_ar"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Title_ar')}}</label>
                                    <input type="text" name="title_ar" id="title_ar" class="form-control"
                                           value="{{$fees->getTranslation('title','ar')}}" required>
                                    <input type="hidden" name="id" id="id" value="{{$fees->id}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="title_en"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Title_en')}}</label>
                                    <input type="text" name="title_en" id="title_en" class="form-control"
                                           value="{{$fees->getTranslation('title','en')}}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="amount"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Amount')}}</label>
                                    <input type="number" placeholder="0.00" name="amount" id="amount" min="0" value="{{$fees->amount}}"
                                           step="0.01" required
                                           class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="vat"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Vat')}}</label>
                                    <select name="vat" id="vat" class="form-control" style="height: 5%" required>
                                        <option selected disabled>{{trans('Account.Select')}}</option>
                                        <option value="5" {{($fees->vat == '5')?'selected':''}}>5%</option>
                                        <option value="10" {{($fees->vat == '10')?'selected':''}}>10%</option>
                                        <option value="15" {{($fees->vat == '15')?'selected':''}}>15%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="grade_id"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Grade')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control" required
                                            onchange="console.log($(this).val())"
                                            style="height: 5%">
                                        <option selected disabled>{{trans('Account.Select')}}</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}" {{($grade->id == $fees->grade_id)?'selected':''}}>{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="classroom_id"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Classroom')}}</label>
                                    <select name="classroom_id" id="classroom_id" class="form-control" required
                                            style="height: 5%">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fee_type"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Fee_Type')}}</label>
                                    <select name="fee_type" id="fee_type" class="form-control" style="height: 5%"
                                            required>
                                        <option selected disabled>{{trans('Account.Select')}}</option>
                                        @foreach($fee_types as $fee_type)
                                            <option value="{{$fee_type->id}}" {{($fee_type->id == $fees->fee_type)?'selected':''}}>{{$fee_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Academic')}}</label>
                                    <select name="academic_year" id="academic_year" class="form-control"
                                            style="height: 5%" required>
                                        <option selected disabled>{{trans('Account.Select')}}</option>
                                        <option value="{{date('Y')}}" {{(date('Y') == $fees->academic_year)?'selected':''}}>{{date('Y')}}</option>
                                        <option value="{{date('Y')+1}}" {{(date('Y')+1 == $fees->academic_year)?'selected':''}}>{{date('Y')+1}}</option>
                                        <option value="{{date('Y')+2}}" {{(date('Y')+2 == $fees->academic_year)?'selected':''}}>{{date('Y')+2}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description"
                                           style="font-weight: bolder; font-size: 14px;">{{trans('Account.Description')}}</label>
                                    <textarea name="description" id="description" class="form-control"
                                              rows="3">{{$fees->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">{{trans('Account.Save')}}</button>
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
                                type: 'Get',
                                dataType: 'json',
                                success: function (data) {
                                    $('select[name="classroom_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="classroom_id"]').append(
                                            '<option value="' + key + '">' + value + '</option>'
                                        );
                                    })
                                }
                            }
                        );
                    } else {
                        console.log('Ajax did not run');
                    }
                }
            )
        })
    </script>
@endsection
