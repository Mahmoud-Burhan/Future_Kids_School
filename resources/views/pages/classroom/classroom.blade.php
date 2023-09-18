@extends('layouts.master')
@section('css')

@section('title')
    {{trans('classroom.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('classroom.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('classroom.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('classroom.Title')}}</li>
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

                    <form method="post" action="{{route('filter_classroom')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <select name="grade_id" id="grade_id" class="form-control" onchange="this.form.submit()" style="height: 50px;">
                                    <option disabled selected>{{trans('classroom.Filter_search')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br> <br> <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table table-success">
                                <th>
                                    <input type="checkbox" name="selectAll" id="selectAll" onclick="CheckAll('box1',this)">
                                </th>
                                <th>#</th>
                                <th>{{trans('classroom.Class_name')}}</th>
                                <th>{{trans('classroom.Grade_name')}}</th>
                                <th>{{trans('classroom.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($details))
                                <?php $Lists_Class = $details; ?>
                            @else
                                <?php $Lists_Class = $classrooms; ?>
                            @endif

                            @foreach($Lists_Class as $classroom)
                                <tr>
                                    <td style="padding-right: 1.5%">
                                        <input type="checkbox" class="box1" value="{{$classroom->id}}">
                                    </td>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$classroom->class_name}}</td>
                                    <td>{{$classroom->Grade->name}}</td>
                                    <td>
                                        <button class="modal-effect btn btn-outline-primary btn-sm" data-effect="effect-scale"
                                                data-toggle="modal" data-target="#EditModal{{$classroom->id}}">
                                            <i class="fa fa-edit"></i>
                                            {{trans('classroom.Edit_class')}}
                                        </button>

                                        <button class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                                data-toggle="modal" data-target="#DeleteModal{{$classroom->id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('classroom.Delete_class')}}
                                        </button>
                                    </td>
                                </tr>

                                {{-------------Edit Modal-------------}}
                                <div class="modal fade" id="EditModal{{$classroom->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{trans('classroom.Edit_class')}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true" style="color: red">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('Classroom.update','test')}}">
                                                {{csrf_field()}}
                                                {{ method_field('PUT') }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_ar">{{trans('classroom.Name_ar')}}</label>
                                                                <input type="text" class="form-control" name="name_ar" id="name_ar"
                                                                       required  value="{{ $classroom->getTranslation('class_name','ar') }}">
                                                                <input type="hidden" id="id" name="id" value="{{$classroom->id}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_en">{{trans('classroom.Name_en')}}</label>
                                                                <input type="text" class="form-control" name="name_en" id="name_en"
                                                                       required  value="{{ $classroom->getTranslation('class_name','en') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="grade_id">{{trans('classroom.Grade_name')}}</label>
                                                                <select class="form-control" name="grade_id" id="grade_id"
                                                                        style="height: 75%">
                                                                    @foreach($grades as $grade)
                                                                        <option value="{{$grade->id}}" {{ ($grade->id == $classroom->grade_id)?'selected':'' }}>{{$grade->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">{{trans('classroom.Save')}}</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('classroom.Close')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--------------End-------------------}}


                                {{-------------Delete Modal-------------}}
                                <div class="modal fade" id="DeleteModal{{$classroom->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h4 class="modal-title">{{trans('classroom.Delete_class')}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true" style="color: red">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('Classroom.destroy','test')}}">
                                                {{csrf_field()}}
                                                {{ method_field('Delete') }}
                                                <div class="modal-body">
                                                    <h4 style="color: red">{{trans('messages.Delete_Message')}}</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_ar">{{trans('classroom.Name_ar')}}</label>
                                                                <input type="text" class="form-control" name="name_ar" id="name_ar"
                                                                       required  value="{{ $classroom->getTranslation('class_name','ar') }}">
                                                                <input type="hidden" id="id" name="id" value="{{$classroom->id}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_en">{{trans('classroom.Name_en')}}</label>
                                                                <input type="text" class="form-control" name="name_en" id="name_en"
                                                                       required  value="{{ $classroom->getTranslation('class_name','en') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">{{trans('classroom.Delete')}}</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('classroom.Close')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--------------End-------------------}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{--Add new Class button--}}
                    <button class="modal-effect btn btn-success" data-effect="effect-scale" data-toggle="modal"
                            data-target="#AddModal">
                        <i class="fa fa-plus"></i>
                        {{trans('classroom.Add_new_classroom')}}
                    </button>
                    {{---------End-------------}}
                    &nbsp; &nbsp;
                    {{--Delete All Class Button--}}
                    <button class="modal-effect btn btn-danger" id="btn_delete_all">
                        <i class="fa fa-trash"></i>
                        {{trans('classroom.Delete_class')}}
                    </button>
                    {{---------End-------------}}

                </div>

            </div>
        </div>
    </div>
    <!-- row closed -->

    {{--Add new Class Modal--}}
    <div class="modal fade" id="AddModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('classroom.Add_new_classroom')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true" style="color: red">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('Classroom.store')}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="repeater">
                            <div data-repeater-list="Lists_Class">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name_ar">{{trans('classroom.Name_ar')}}</label>
                                                <input type="text" class="form-control" name="name_ar" id="name_ar"
                                                       required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name_en">{{trans('classroom.Name_en')}}</label>
                                                <input type="text" class="form-control" name="name_en" id="name_en"
                                                       required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="grade_id">{{trans('classroom.Grade_name')}}</label>
                                                <select class="form-control" name="grade_id" id="grade_id"
                                                        style="height: 75%">
                                                    @foreach($grades as $grade)
                                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="action">{{trans('classroom.Name_en')}}</label>
                                                <br>
                                                <button class="btn btn-danger" data-repeater-delete
                                                        style="height: 5%;width: 95%;margin-top: 3.9%">
                                                    {{trans('classroom.Delete_row')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-dark" data-repeater-create
                                    style="height: 15%;width: 25%;margin-top: 1.9%">
                                {{trans('classroom.Add_row')}}
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{trans('classroom.Save')}}</button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{trans('classroom.Close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{---------End--------------}}


    {{-------------Delete All Modal-------------}}
    <div class="modal fade" id="delete_all">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('classroom.Delete_class')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true" style="color: red">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('delete_checked')}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <h4 style="color: red">{{trans('messages.Delete_Message')}}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" id="delete_id" name="delete_id" value="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">{{trans('classroom.Delete')}}</button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{trans('classroom.Close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--------------End-------------------}}


@endsection
@section('js')
    <script>
        function CheckAll(classname,elem) {
            var element = document.getElementsByClassName(classname);
            var l = element.length;
            if(elem.checked)
            {
                for(var i=0;i<l;i++)
                {
                    element[i].checked=true
                }
            }
            else
            {
                for(var i=0;i<l;i++)
                {
                    element[i].checked=false
                }
            }
        }
    </script>

    <script>
        $(function () {
            $('#btn_delete_all').click(function () {
                var selected = new Array();
                $('#datatable input[type=checkbox]:checked').each(function () {
                    selected.push(this.value);
                })
                if(selected.length>0)
                {
                    $('#delete_all').modal('show');
                    $('input[id="delete_id"]').val(selected)
                }
            })
        })
    </script>
@endsection
