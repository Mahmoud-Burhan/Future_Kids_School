@extends('layouts.master')
@section('css')

@section('title')
    {{trans('teacher.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">   {{trans('teacher.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">  {{trans('teacher.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">  {{trans('teacher.Title')}}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr class="table table-success">
                                <th>#</th>
                                <th>{{trans('teacher.Teacher_name')}}</th>
                                <th>{{trans('teacher.Gender')}}</th>
                                <th>{{trans('teacher.Joining_Date')}}</th>
                                <th>{{trans('teacher.Specialization')}}</th>
                                <th>{{trans('teacher.Action')}}</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->Gender->name}}</td>
                                    <td>{{$teacher->joining_date}}</td>
                                    <td>{{$teacher->Specialization->name}}</td>
                                    <td>
                                        <a href="{{route('Teacher.edit',$teacher->id)}}" class="btn btn-primary btn-sm" title="{{trans('teacher.Edit_Teacher')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="modal-effect btn btn-danger btn-sm"
                                                data-effect="effect-scale"
                                                data-toggle="modal"
                                                data-target="#modaldemo3{{$teacher->id}}"
                                                title="{{trans('teacher.Delete')}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                {{--Delete modal--}}
                                <div class="modal fade" id="modaldemo3{{$teacher->id}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h3 class="modal-title">{{trans('teacher.Delete')}}</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true" style="color: red">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('Teacher.destroy','test')}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <h4 style="color: red">{{trans('messages.Delete_Message')}}</h4>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_ar">{{trans('section.Name_ar')}}</label>
                                                                <input type="text" name="name_ar" id="name_ar" class="form-control"
                                                                       value="{{$teacher->getTranslation('name','ar')}}" readonly>
                                                                <input type="hidden" name="id" id="id" value="{{$teacher->id}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name_en">{{trans('section.Name_en')}}</label>
                                                                <input type="text" name="name_en" id="name_en" class="form-control"
                                                                       value="{{$teacher->getTranslation('name','en')}}" readonly>
                                                                <input type="hidden" name="id" id="id" value="{{$teacher->id}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">{{trans('teacher.Delete')}}</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('teacher.Close')}}</button>
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
                    <a href="{{route('Teacher.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        {{trans('teacher.Add_title')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
