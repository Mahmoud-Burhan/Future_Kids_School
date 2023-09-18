<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>

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



        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams">
                <div class="pull-left"><i class="fas fa-edit"></i><span
                            class="right-nav-text">{{trans('main-sidebar.Exam')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Student_Exams.index')}}">{{trans('quiz.Title')}}</a></li>

            </ul>
        </li>





        <li>
            <a href="{{route('profile.index')}}" style="font-size: 15px;"> <i class="fas fa-user-edit"></i>
                <span class="right-nav-text"></span>
                {{trans('main-sidebar.Personal_Information')}}
            </a>
        </li>

    </ul>
</div>
</div>

<!-- Left Sidebar End-->

<!--=================================
