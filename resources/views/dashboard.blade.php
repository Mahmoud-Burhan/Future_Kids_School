<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @include('layouts.head')
    @livewireStyles

</head>

<body>
<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

@include('layouts.main-header')

@include('layouts.main-sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{trans('admin_dashboard.Welcome')}} {{auth()->user()->name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-danger">
                                       <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark" style="font-weight: bolder;font-size: 16px;">
                                    {{trans('admin_dashboard.total_student')}}
                                </p>
                                <h4>{{App\Models\Student::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">

                            <a href="{{route('Student.index')}}" target="_blank">
                                <span class="text-primary">
                                <i class="fa fa-binoculars"></i>
                                {{trans('admin_dashboard.view_details')}}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                       <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark" style="font-weight: bolder;font-size: 16px;">
                                    {{trans('admin_dashboard.total_teacher')}}
                                </p>
                                <h4>{{App\Models\Teacher::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <a href="{{route('Teacher.index')}}" target="_blank">
                                <span class="text-primary">
                                    <i class="fa fa-binoculars"></i>
                                     {{trans('admin_dashboard.view_details')}}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-info">
                                       <i class="fa fa-child highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark" style="font-weight: bolder;font-size: 16px;">
                                    {{trans('admin_dashboard.total_family')}}
                                </p>
                                <h4>{{App\Models\Family::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">

                            <a href="{{url('my-family')}}" target="_blank">
                                <span class="text-primary">
                                    <i class="fa fa-binoculars"></i>
                                     {{trans('admin_dashboard.view_details')}}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-warning">
                                       <i class="fas fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark" style="font-weight: bolder;font-size: 16px;">
                                    {{trans('admin_dashboard.total_users')}}
                                </p>
                                <h4>
                                    {{App\Models\Student::count()+ App\Models\Teacher::count()+ App\Models\Family::count()}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Orders Status widgets-->

        <div class="row">

            <div style="height: 400px;" class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="tab nav-border" style="position: relative;">
                            <div class="d-block d-md-flex justify-content-between">
                                <div class="d-block w-100">
                                    <h5 style="font-family: 'Cairo', sans-serif"
                                        class="card-title">{{trans('admin_dashboard.latest_action')}}</h5>
                                </div>
                                <div class="d-block d-md-flex nav-tabs-custom">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                               href="#students" role="tab" aria-controls="students"
                                               aria-selected="true"> {{trans('admin_dashboard.student')}}</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                               role="tab" aria-controls="teachers"
                                               aria-selected="false">{{trans('admin_dashboard.teacher')}}
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="families-tab" data-toggle="tab" href="#families"
                                               role="tab" aria-controls="families"
                                               aria-selected="false">{{trans('admin_dashboard.family')}}
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="fee_invoices-tab" data-toggle="tab"
                                               href="#fee_invoices"
                                               role="tab" aria-controls="fee_invoices"
                                               aria-selected="false">{{trans('admin_dashboard.invoice')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                {{--Student Table--}}
                                <div class="tab-pane fade active show" id="students" role="tabpanel"
                                     aria-labelledby="students-tab">
                                    <div class="table-responsive mt-15">
                                        <table class="table  table-hover table-sm table-bordered p-0">
                                            <thead>
                                            <tr class="table table-primary"
                                                style="text-align: center;font-weight: bolder">
                                                <th>#</th>
                                                <th>{{trans('admin_dashboard.Student_name')}}</th>
                                                <th>{{trans('admin_dashboard.Email')}}</th>
                                                <th>{{trans('admin_dashboard.Gender')}}</th>
                                                <th>{{trans('admin_dashboard.Grade')}}</th>
                                                <th>{{trans('admin_dashboard.Classroom')}}</th>
                                                <th>{{trans('admin_dashboard.Section')}}</th>
                                                <th>{{trans('admin_dashboard.Added_date')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                <tr style="text-align: center">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student->Gender->name}}</td>
                                                    <td>{{$student->Grades->name}}</td>
                                                    <td>{{$student->Classroom->class_name}}</td>
                                                    <td>{{$student->Section->section_name}}</td>
                                                    <td>{{date('d-m-Y',strtotime($student->created_at))}}</td>
                                                    @empty
                                                        <td class="alert-danger" style="text-align: center" colspan="8">
                                                            {{trans('admin_dashboard.No_data')}}
                                                        </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{--Teacher table--}}
                                <div class="tab-pane fade" id="teachers" role="tabpanel"
                                     aria-labelledby="teachers-tab">
                                    <div class="table-responsive mt-15">
                                        <table class="table  table-hover table-sm table-bordered p-0">
                                            <thead>
                                            <tr class="table table-primary"
                                                style="text-align: center;font-weight: bolder">
                                                <th>#</th>
                                                <th>{{trans('admin_dashboard.Teacher_name')}}</th>
                                                <th>{{trans('admin_dashboard.Gender')}}</th>
                                                <th>{{trans('admin_dashboard.Joining_Date')}}</th>
                                                <th>{{trans('admin_dashboard.Specialization')}}</th>
                                                <th>{{trans('admin_dashboard.Added_date')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tr style="text-align: center">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$teacher->name}}</td>
                                                    <td>{{$teacher->Gender->name}}</td>
                                                    <td>{{$teacher->joining_date}}</td>
                                                    <td>{{$teacher->Specialization->name}}</td>
                                                    <td>{{date('d-m-Y',strtotime($teacher->created_at))}}</td>
                                                    @empty
                                                        <td class="alert-danger" style="text-align: center" colspan="8">
                                                            {{trans('admin_dashboard.No_data')}}
                                                        </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{--Family table--}}
                                <div class="tab-pane fade" id="families" role="tabpanel"
                                     aria-labelledby="families-tab">
                                    <div class="table-responsive mt-15">
                                        <table class="table  table-hover table-sm table-bordered p-0">
                                            <thead>
                                            <tr class="table table-primary"
                                                style="text-align: center;font-weight: bolder">
                                                <th>#</th>
                                                <th>{{trans('admin_dashboard.Father_name')}}</th>
                                                <th>{{trans('admin_dashboard.Email')}}</th>
                                                <th>{{trans('admin_dashboard.Father_Phone')}}</th>
                                                <th>{{trans('admin_dashboard.Father_Address')}}</th>
                                                <th>{{trans('admin_dashboard.Added_date')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\Family::latest()->take(5)->get() as $teacher)
                                                <tr style="text-align: center">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$teacher->father_name}}</td>
                                                    <td>{{$teacher->email}}</td>
                                                    <td>{{$teacher->father_phone}}</td>
                                                    <td>{{$teacher->father_address}}</td>
                                                    <td>{{date('d-m-Y',strtotime($teacher->created_at))}}</td>
                                                    @empty
                                                        <td class="alert-danger" style="text-align: center" colspan="8">
                                                            {{trans('admin_dashboard.No_data')}}
                                                        </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="fee_invoices" role="tabpanel"
                                     aria-labelledby="fee_invoices-tab">
                                    <div class="table-responsive mt-15">
                                        <table class="table  table-hover table-sm table-bordered p-0">
                                            <thead>
                                            <tr class="table table-primary"
                                                style="text-align: center;font-weight: bolder">
                                                <th>#</th>
                                                <th>{{trans('admin_dashboard.Invoice_date')}}</th>
                                                <th>{{trans('admin_dashboard.Student_Name')}}</th>
                                                <th>{{trans('admin_dashboard.Grade')}}</th>
                                                <th>{{trans('admin_dashboard.Classroom')}}</th>
                                                <th>{{trans('admin_dashboard.Section')}}</th>
                                                <th>{{trans('admin_dashboard.Fee_Type')}}</th>
                                                <th>{{trans('admin_dashboard.Amount')}}</th>
                                                <th>{{trans('admin_dashboard.Added_date')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\FeeInvoice::latest()->take(10)->get() as $invoice)
                                                <tr style="text-align: center">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$invoice->invoice_date}}</td>
                                                    <td>{{$invoice->Student->name}}</td>
                                                    <td>{{$student->Grades->name}}</td>
                                                    <td>{{$student->Classroom->class_name}}</td>
                                                    <td>{{$student->Section->section_name}}</td>
                                                    <td>{{$invoice->FeesType->name}}</td>
                                                    <td>{{$invoice->total}}</td>
                                                    <td>{{date('d-m-Y',strtotime($invoice->created_at))}}</td>

                                                    @empty
                                                        <td class="alert-danger" style="text-align: center" colspan="8">
                                                            {{trans('admin_dashboard.No_data')}}
                                                        </td>

                                                </tr>
                                            @endforelse
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

        {{--Calendar part--}}
        <livewire:calendar />



        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>


<!--=================================
footer -->

@include('layouts.footer-scripts')
@livewireScripts
@stack('scripts')
</body>

</html>
