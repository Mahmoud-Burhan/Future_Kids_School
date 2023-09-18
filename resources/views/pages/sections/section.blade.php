@extends('layouts.master')

@section('css')
@section('title')
    {{trans('section.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('section.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color">{{trans('section.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('section.Title')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        @foreach($grades as $grade)
                            <div class="acd-group">
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="table-responsive">
                                            <table class="table table-bordered mg-b-0 text-md-nowrap">
                                                <thead>
                                                <tr style="text-align: center">
                                                    <th>#</th>
                                                    <th>{{trans('section.Section_name')}}</th>
                                                    <th>{{trans('section.Class_name')}}</th>
                                                    <th>{{trans('section.Status')}}</th>
                                                    <th>{{trans('section.Action')}}</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grade->Sections as $grade_section)
                                                    <tr style="text-align: center">
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <td>{{$grade_section->section_name}}</td>
                                                        <td>{{$grade_section->Classroom->class_name}}</td>
                                                        <td>
                                                            @if($grade_section->status==1)
                                                                <span class="badge badge-success ">{{trans('section.Active')}}</span>
                                                            @else
                                                                <span class="badge badge-danger ">{{trans('section.Not_Active')}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="modal-effect btn btn-outline-primary btn-sm"
                                                                    data-effect="effect-scale"
                                                                    data-toggle="modal"
                                                                    data-target="#modaldemo{{$grade_section->id}}">
                                                                <i class="fa fa-edit"></i>
                                                                {{trans('section.Edit_section')}}
                                                            </button>
                                                            &nbsp;
                                                            <button class="modal-effect btn btn-outline-danger btn-sm"
                                                                    data-effect="effect-scale"
                                                                    data-toggle="modal"
                                                                    data-target="#modaldemo3{{$grade_section->id}}">
                                                                <i class="fa fa-trash"></i>
                                                                {{trans('section.Delete_section')}}
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    {{--Edit modal--}}
                                                    <div class="modal fade" id="modaldemo{{$grade_section->id}}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">{{trans('section.Edit_section')}}</h3>
                                                                    <button type="button" class="Close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" style="color: red">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                      action="{{route('Section.update','test')}}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="name_ar">{{trans('section.Name_ar')}}</label>
                                                                                    <input type="text" name="name_ar"
                                                                                           id="name_ar"
                                                                                           class="form-control"
                                                                                           value="{{$grade_section->getTranslation('section_name','ar')}}"
                                                                                           required>
                                                                                    <input type="hidden" name="id"
                                                                                           id="id"
                                                                                           value="{{$grade_section->id}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="name_en">{{trans('section.Name_en')}}</label>
                                                                                    <input type="text" name="name_en"
                                                                                           id="name_en"
                                                                                           class="form-control"
                                                                                           value="{{$grade_section->getTranslation('section_name','en')}}"
                                                                                           required>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="grade_id">{{trans('section.Grade_name')}}</label>
                                                                                    <select name="grade_id"
                                                                                            id="grade_id"
                                                                                            class="form-control"
                                                                                            style="height: 10%"
                                                                                            onchange="console.log($(this).val())">
                                                                                        <option selected
                                                                                                disabled>{{trans('section.Select_class')}}
                                                                                            "
                                                                                        </option>
                                                                                        @foreach($list_grades as $list_grade)
                                                                                            <option value="{{$list_grade->id}}" {{ ($list_grade->id == $grade_section->grade_id)?'selected':'' }}>
                                                                                                {{$list_grade->name}}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="class_id">{{trans('section.Class_name')}}</label>
                                                                                    <select name="class_id"
                                                                                            id="class_id"
                                                                                            class="form-control"
                                                                                            style="height: 10%">

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <select id="teacher_id[]" name="teacher_id[]" multiple="multiple" class="form-control" required>
                                                                                        @foreach($grade_section->teachers as $teacher)
                                                                                            <option selected value="{{$teacher['id']}}">{{$teacher['name']}}</option>
                                                                                        @endforeach

                                                                                        @foreach($teachers as $teacher)
                                                                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    @if($grade_section->status==1)
                                                                                        <input type="checkbox"
                                                                                               name="status" id="status"
                                                                                               checked>
                                                                                        <label for="checkbox">{{trans('section.Status')}}</label>
                                                                                    @else
                                                                                        <input type="checkbox"
                                                                                               name="status" id="status"
                                                                                               checked>
                                                                                        <label for="checkbox">{{trans('section.Status')}}</label>
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                                class="btn btn-primary">{{trans('section.Update')}}</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{trans('section.Close')}}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--End of edit modal--}}


                                                    {{--Delete modal--}}
                                                    <div class="modal fade" id="modaldemo3{{$grade_section->id}}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">{{trans('section.Delete_section')}}</h3>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="close">
                                                                        <span aria-hidden="true" style="color: red">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post"
                                                                      action="{{route('Section.destroy','test')}}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-body">
                                                                        <h4 style="color: red">{{trans('messages.Delete_Message')}}</h4>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="name_ar">{{trans('section.Name_ar')}}</label>
                                                                                    <input type="text" name="name_ar"
                                                                                           id="name_ar"
                                                                                           class="form-control"
                                                                                           value="{{$grade_section->getTranslation('section_name','ar')}}"
                                                                                           readonly>
                                                                                    <input type="hidden" name="id"
                                                                                           id="id"
                                                                                           value="{{$grade_section->id}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="name_en">{{trans('grade.Name_en')}}</label>
                                                                                    <input type="text" name="name_en"
                                                                                           id="name_en"
                                                                                           class="form-control"
                                                                                           value="{{$grade_section->getTranslation('section_name','en')}}"
                                                                                           readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{trans('section.Delete')}}</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{trans('section.Close')}}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--End of delete modal--}}

                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                    <br>
                    <button class="modal-effect btn btn-success" data-effect="effect-scale" data-toggle="modal"
                            href="#modal8">
                        {{trans('section.Add_new_section')}}
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- row closed -->

    {{-----------------------Add Section----------------------------}}
    <div class="modal fade" id="modal8">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('section.Add_new_section')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true" style="color: red">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('Section.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar">{{trans('section.Name_ar')}}</label>
                                    <input type="text" class="form-control" name="name_ar" id="name_ar"
                                           placeholder="{{trans('section.Name_ar')}}"
                                           autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en">{{trans('section.Name_en')}}</label>
                                    <input type="text" class="form-control" name="name_en" id="name_en"
                                           placeholder="{{trans('section.Name_en')}}"
                                           autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="grade_id">{{trans('section.Grade_name')}}</label>
                                    <select name="grade_id" id="grade_id" class="form-control" style="height: 10%"
                                            onchange="console.log($(this).val())">>
                                        <option selected disabled>{{trans('section.Select_class')}}"</option>
                                        @foreach($list_grades as $list_grade)
                                            <option value="{{$list_grade->id}}">{{$list_grade->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="class_id">{{trans('section.Class_name')}}</label>
                                    <select name="class_id" id="class_id" class="form-control" style="height: 10%">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select id="teacher_id[]" name="teacher_id[]" multiple="multiple" class="form-control" required>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{trans('section.Save')}}</button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{trans('section.Close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-------------------------END--------------------------}}


@endsection
@section('js')
    @toastr_js
    @toastr_render
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
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="class_id"]').append(
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
