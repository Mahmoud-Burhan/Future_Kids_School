@extends('layouts.master')

@section('css')
@section('title')
    {{trans('grade.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('grade.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                                                   class="default-color">{{trans('main-sidebar.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('grade.Title')}}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table table-success">
                                <th>#</th>
                                <th>{{trans('grade.Grade_name')}}</th>
                                <th>{{trans('grade.Notes')}}</th>
                                <th>{{trans('grade.Action')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$grade->name}}</td>
                                    <td>{{$grade->notes}}</td>
                                    <td>
                                        <button class="modal-effect btn btn-outline-primary btn-sm" data-effect="effect-scale"
                                                data-toggle="modal" data-target="#modaldemo{{$grade->id}}" >
                                            <i class="fa fa-edit"></i>
                                            {{trans('grade.Edit_grade')}}
                                        </button>
                                        &nbsp;
                                        <button class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                                data-toggle="modal" data-target="#modaldemo3{{$grade->id}}">
                                            <i class="fa fa-trash"></i>
                                            {{trans('grade.Delete_grade')}}
                                        </button>
                                    </td>
                                </tr>
                                {{--Edit modal--}}
                                <div class="modal fade" id="modaldemo{{$grade->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h3 class="modal-title">{{trans('grade.Edit_grade')}}</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true" style="color: red">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('Grade.update','test')}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_ar">{{trans('grade.Name_ar')}}</label>
                                                                <input type="text" name="name_ar" id="name_ar" class="form-control"
                                                                       value="{{$grade->getTranslation('name','ar')}}" required>
                                                                <input type="hidden" name="id" id="id" value="{{$grade->id}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_en">{{trans('grade.Name_en')}}</label>
                                                                <input type="text" name="name_en" id="name_en" class="form-control"
                                                                       value="{{$grade->getTranslation('name','en')}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="name_en">{{trans('grade.Notes')}}</label>
                                                                <textarea class="form-control" name="notes" id="notes" rows="4">{{$grade->notes}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">{{trans('grade.Update')}}</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('grade.Close')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--End of edit modal--}}

                                {{--Delete modal--}}
                                <div class="modal fade" id="modaldemo3{{$grade->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h3 class="modal-title">{{trans('grade.Delete_grade')}}</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true" style="color: red">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('Grade.destroy','test')}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <h4 style="color: red">{{trans('messages.Delete_Message')}}</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_ar">{{trans('grade.Name_ar')}}</label>
                                                                <input type="text" name="name_ar" id="name_ar" class="form-control"
                                                                       value="{{$grade->getTranslation('name','ar')}}" readonly>
                                                                <input type="hidden" name="id" id="id" value="{{$grade->id}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_en">{{trans('grade.Name_en')}}</label>
                                                                <input type="text" name="name_en" id="name_en" class="form-control"
                                                                       value="{{$grade->getTranslation('name','en')}}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">{{trans('grade.Delete')}}</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('grade.Close')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--Delete of edit modal--}}
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <br>
                    <td>
                        <button class="modal-effect btn btn-success" data-effect="effect-scale" data-toggle="modal"
                                href="#modal8">
                            {{trans('grade.Add_new_grade')}}
                        </button>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    {{--Add moodal--}}

    <div class="modal fade" id="modal8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h3 class="modal-title">{{trans('grade.Add_grade')}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true" style="color: red">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('Grade.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar">{{trans('grade.Name_ar')}}</label>
                                    <input type="text" name="name_ar" id="name_ar" class="form-control"
                                           autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en">{{trans('grade.Name_en')}}</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control"
                                           autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name_en">{{trans('grade.Notes')}}</label>
                                    <textarea class="form-control" name="notes" id="notes" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{trans('grade.Save')}}</button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{trans('grade.Close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--Edit Modal--}}

@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
