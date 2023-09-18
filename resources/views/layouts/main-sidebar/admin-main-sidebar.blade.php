<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                <div class="pull-left"><i class="ti-home"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Dashboard')}}</span>
                </div>

            </a>
        </li>
        <br>
        <!-- menu item Elements-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                <div class="pull-left"><i class="ti-list-ol"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Grade')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Grade.index')}}">{{trans('grade.Grade_List')}}</a></li>
            </ul>
        </li>
        <!-- menu item calendar-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                <div class="pull-left"><i class="ti-book"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Class')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Classroom.index')}}">{{trans('classroom.Class_List')}}</a></li>
            </ul>
        </li>
        <!-- menu item Charts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                <div class="pull-left"><i class="ti-blackboard"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Section')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Section.index')}}">{{trans('section.Section_List')}}</a></li>

            </ul>
        </li>

        <!-- menu font icon-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                <div class="pull-left"><i class="fa fa-graduation-cap"></i><span class="right-nav-text">
                                    {{trans('main-sidebar.Student')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                {{--Student information--}}
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#studinfo">
                        <div class="pull-left"><span class="right-nav-text">
                                    {{trans('student_promotion.Student_Information')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="studinfo" class="collapse" data-parent="#sidee">
                        <li><a href="{{route('Student.create')}}"> {{trans('student.Add_title')}}</a></li>
                        <li><a href="{{route('Student.index')}}"> {{trans('student.Student_List')}}</a></li>
                    </ul>
                </li>
                {{--End of student information--}}

                {{--Student Promotion--}}
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#studprom">
                        <div class="pull-left"><span class="right-nav-text">
                                    {{trans('student_promotion.Promotion_Management')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="studprom" class="collapse" data-parent="#prom">
                        <li>
                            <a href="{{route('StudentPromotion.create')}}"> {{trans('student_promotion.Student_Promotion')}}</a>
                        </li>
                        <li>
                            <a href="{{route('StudentPromotion.index')}}"> {{trans('student_promotion.Promotion_List')}}</a>
                        </li>

                    </ul>
                </li>
                {{--End of student promotion--}}

                {{--Student Promotion--}}
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#studgrad">
                        <div class="pull-left"><span class="right-nav-text">
                                    {{trans('student_graduate.Graduated_Students')}}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="studgrad" class="collapse" data-parent="#grad">
                        <li>
                            <a href="{{route('StudentGraduate.create')}}"> {{trans('student_graduate.New_Graduated_Students')}}</a>
                        </li>
                        <li>
                            <a href="{{route('StudentGraduate.index')}}"> {{trans('student_graduate.Student_Graduate_List')}}</a>
                        </li>

                    </ul>
                </li>
                {{--End of student promotion--}}

            </ul>
        </li>

        <!-- menu item Form-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                <div class="pull-left"><i class="fa fa-user"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Teacher')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Teacher.index')}}">{{trans('teacher.Teacher_List')}}</a></li>

            </ul>
        </li>
        <!-- menu item table -->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parent">
                <div class="pull-left"><i class="fa fa-child"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Parent')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Parent" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{url('my-family')}}">{{trans('family.Parent_List')}}</a></li>

            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Account">
                <div class="pull-left"><i class="fa fa-money"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Account')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Account" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Fees.index')}}">{{trans('Account.Title')}}</a></li>
                <li><a href="{{route('FeesInvoice.index')}}">{{trans('fees_invoice.Title')}}</a></li>
                <li><a href="{{route('ReceiptStudent.index')}}">{{trans('receipt.Title')}}</a></li>
                <li><a href="{{route('ProcessingFee.index')}}">{{trans('processing.Title')}}</a></li>
                <li><a href="{{route('PaymentFee.index')}}">{{trans('payment.Title')}}</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance">
                <div class="pull-left"><i class="fa fa-calendar"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Attendance')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Attendance" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('StudentAttendance.index')}}">{{trans('attendance.Side_Title')}}</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subject">
                <div class="pull-left"><i class="fa fa-book"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Subject')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Subject" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Subject.index')}}">{{trans('subject.Title')}}</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams">
                <div class="pull-left"><i class="fa fa-pencil"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Exam')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Quizzes.index')}}">{{trans('quiz.Title')}}</a></li>
                <li><a href="{{route('Question.index')}}">{{trans('question.Title')}}</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Library">
                <div class="pull-left"><i class="fa fa-book"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Library')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Library" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Library.index')}}">{{trans('library.Side_Title')}}</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#OnlineClasses">
                <div class="pull-left"><i class="fa fa-video-camera"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Online_Class')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="OnlineClasses" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('OnlineClasses.index')}}">{{trans('online_classes.Direct_zoom')}}</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{route('Setting.index')}}" style="font-size: 15px;"> <i class="fa fa-cogs"></i>
                <span class="right-nav-text"></span>
                {{trans('settings.Title')}}
            </a>
        </li>

    </ul>
</div>
</div>

<!-- Left Sidebar End-->

<!--=================================
