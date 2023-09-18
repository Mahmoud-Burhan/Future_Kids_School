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
            <a href="{{route('sons.index')}}"><i class="fas fa-book-open"></i><span
                        class="right-nav-text">الابناء</span></a>
        </li>

        <li>
            <a href="{{route('sons.attendances')}}"><i class="fas fa-book-open"></i><span
                        class="right-nav-text">تقرير الحضور والغياب</span></a>
        </li>

        <li>
            <a href="{{route('sons.fees')}}"><i class="fas fa-book-open"></i><span
                        class="right-nav-text">تقرير المالية</span></a>
        </li>




        <li>
            <a href="{{route('profile-student.index')}}"><i class="fas fa-id-card-alt"></i><span
                        class="right-nav-text">الملف الشخصي</span></a>
        </li>

    </ul>
</div>
</div>

<!-- Left Sidebar End-->

<!--=================================
