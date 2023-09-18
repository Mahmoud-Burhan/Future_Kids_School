@extends('layouts.master')
@section('css')

@section('title')
    {{trans('student.Title')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('student.Title')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('student.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('student.Title')}}</li>
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
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" href="#home-02" role="tab"
                                    data-toggle="tab" aria-controls="home-02" aria-selected="true">
                                        {{trans('student.Student_Details')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-03-tab" href="#home-03" data-toggle="tab"
                                    role="tab" aria-controls="home-03" aria-selected="false">
                                        {{trans('student.Attachments')}}
                                    </a>
                                </li>
                            </ul>
                            <br>
                           <div class="tab-content">
                               <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                    aria-labelledby="home-02-tab">
                                   <div class="table-responsive">
                                       <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                              data-page-length="50"
                                              style="text-align: center">
                                           <thead>
                                           <tr class="table table-success">
                                               <th>{{trans('student.Student_name')}}</th>
                                               <th>{{trans('student.Email')}}</th>
                                               <th>{{trans('student.Gender')}}</th>
                                               <th>{{trans('student.Nationality')}}</th>
                                               <th>{{trans('student.Grade')}}</th>
                                               <th>{{trans('student.Classroom')}}</th>
                                               <th>{{trans('student.Section')}}</th>
                                               <th>{{trans('student.DOB')}}</th>
                                               <th>{{trans('student.Family')}}</th>
                                               <th>{{trans('student.Academic')}}</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           <tr>
                                               <td>{{$student->name}}</td>
                                               <td>{{$student->email}}</td>
                                               <td>{{$student->Gender->name}}</td>
                                               <td>{{$student->Nationality->name}}</td>
                                               <td>{{$student->Grades->name}}</td>
                                               <td>{{$student->Classroom->class_name}}</td>
                                               <td>{{$student->Section->section_name}}</td>
                                               <td>{{$student->date_of_birth}}</td>
                                               <td>{{$student->Family->father_name}}</td>
                                               <td>{{$student->academic_year}}</td>
                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>

                               <div class="tab-pane" id="home-03" role="tabpanel"
                                    aria-labelledby="home-03-tab">
                                   <form method="post" action="{{route('student_attachment')}}" enctype="multipart/form-data">
                                       @csrf
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group">
                                               <label for="photos" style="color: red;font-weight: bolder;font-size: 16px;">
                                                   {{trans('student.Attachments')}}*</label>
                                               <br>
                                               <input type="file" name="photos[]" id="photos[]" accept="image/*" multiple>
                                               <input type="hidden" name="id" id="id" value="{{$student->id}}">
                                               <input type="hidden" name="name" id="name" value="{{$student->getTranslation('name','en')}}">
                                               </div>
                                           </div>
                                       </div>
                                       <br>
                                       <button type="submit" class="btn btn-success">
                                           {{trans('student.Save')}}
                                       </button>
                                   </form>
                                   <br>
                                   <br>
                                   <div class="table-responsive">
                                       <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                              data-page-length="50"
                                              style="text-align: center">
                                           <thead>
                                           <tr class="table table-success">
                                               <th>#</th>
                                               <th>{{trans('student.File_name')}}</th>
                                               <th>{{trans('student.Added_Date')}}</th>
                                               <th>{{trans('student.Action')}}</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           @foreach($student->images as $std)
                                           <tr>
                                               <td>{{$loop->iteration}}</td>
                                               <td>{{$std->file_name}}</td>
                                               <td>{{$std->created_at->diffForHumans()}}</td>
                                               <td>
                                                   <a href="{{route('attachment_download',[$std->id,$student->getTranslation('name','en')])}}" class="btn btn-outline-info btn-sm">
                                                       <i class="fa fa-download"></i>
                                                       {{trans('student.Download')}}
                                                   </a>

                                                   <a href="{{route('attachment_delete',[$std->id,$student->getTranslation('name','en')])}}" class="btn btn-outline-danger btn-sm">
                                                       <i class="fa fa-trash"></i>
                                                       {{trans('student.Delete')}}
                                                   </a>
                                               </td>
                                           </tr>
                                               @endforeach
                                           </tbody>
                                       </table>
                                   </div>
                               </div>

                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
