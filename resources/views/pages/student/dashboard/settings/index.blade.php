@extends('layouts.master')
@section('css')

@section('title')
    {{trans('setting.Personal_Information')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">     {{trans('setting.Personal_Information')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">    {{trans('setting.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">    {{trans('setting.Personal_Information')}}</li>
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
                    <section style="background-color: #eee;">
                        <form action="{{route('profile.update',$information->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                            <img src="{{ URL::asset('Attachments/Student/'.$folder_name.'/'.$info->file_name)}}"
                                                 id="logo" alt="image not found" class="rounded-circle img-fluid"
                                                 style="width: 150px;">
                                            <h5 style="font-family: Cairo" class="my-3">{{$information->name}}</h5>
                                            <h6>{{$information->email}}</h6>
                                            <br>
                                            <input name="file_name" id="file_name" accept="image/*" type="file" class="file-input"
                                                   data-show-caption="false" data-foucs
                                                   onchange="readURL(this)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">{{trans('setting.Name_ar')}}</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">
                                                        <input type="text" name="name_ar"
                                                               value="{{ $information->getTranslation('name', 'ar') }}"
                                                               class="form-control">
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">{{trans('setting.Name_en')}}</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">
                                                        <input type="text" name="name_en"
                                                               value="{{ $information->getTranslation('name', 'en') }}"
                                                               class="form-control">
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">{{trans('setting.Password')}}</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">
                                                        <input type="password" id="password" class="form-control"
                                                               name="password">
                                                    </p><br><br>
                                                    <input type="checkbox" class="form-check-input"
                                                           onclick="myFunction()"
                                                           id="exampleCheck1">
                                                    <label class="form-check-label"
                                                           for="exampleCheck1">{{trans('setting.Show_Password')}}</label>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit"
                                                    class="btn btn-success">{{trans('setting.Update_Information')}}</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#logo').attr('src', e.target.result).width(150).height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
