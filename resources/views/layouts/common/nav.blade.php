<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{!! url('/') !!}" class="logo"><img src="{!! url('images/synrgise-logo.png') !!}"></a>
            </div>
            <!-- End Logo container-->

            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                            <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                            <li class="text-center notifi-title">Notification</li>
                            <li class="list-group">
                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <em class="fa fa-user-plus fa-2x text-info"></em>
                                        </div>
                                        <div class="media-body clearfix">
                                            <div class="media-heading">New user registered</div>
                                            <p class="m-0">
                                                <small>You have 10 unread messages</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <em class="fa fa-diamond fa-2x text-primary"></em>
                                        </div>
                                        <div class="media-body clearfix">
                                            <div class="media-heading">New settings</div>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <em class="fa fa-bell-o fa-2x text-danger"></em>
                                        </div>
                                        <div class="media-body clearfix">
                                            <div class="media-heading">Updates</div>
                                            <p class="m-0">
                                                <small>There are
                                                    <span class="text-primary">2</span> new updates available
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- last list item -->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <small>See all notifications</small>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                            <img src="{!! url('images/users/avatar-1.jpg') !!}" alt="user-img" class="img-circle user-img">
                            <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                            <li>
                                <a href="javascript:void(0)" onclick="$('#logout_form').submit()"><i class="md md-settings-power"></i> Logout</a>
                                {!! Form::open(['url' => url('logout'), 'id'=>'logout_form']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="active"><a href="{!! url('/home') !!}"><i class="md md-home"></i> <span> Dashboard </span> </a></li>
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>

    <div class="subheader">
        <div class="container">
            <div class="row m-b-20">
                <div class="col-md-12">
                    <h1 style="color: #fff;">Tasks</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active published_tasks">
                            <a id="myTasks" onclick="get_task_list('published_tasks')" style="cursor: pointer;">
                                <span class="visible-xs"><i data-toggle="tooltip" title="My Tasks" class="fa fa-user"></i></span>
                                <span class="hidden-xs">My Tasks</span>
                            </a>
                        </li>
                        <li class="manage_tasks">
                            <a id="manageTasks" onclick="get_task_list('manage_tasks')" style="cursor: pointer;">
                                <span class="visible-xs"><i data-toggle="tooltip" title="Manage Tasks" class="fa fa-gear"></i></span>
                                <span class="hidden-xs">Manage Tasks</span>
                            </a>
                        </li>
                        <li class="completed_tasks">
                            <a id="completedTasks" onclick="get_task_list('completed_tasks')" style="cursor: pointer;">
                                <span class="visible-xs"><i data-toggle="tooltip" title="Completed Tasks" class="fa fa-folder-open-o"></i></span>
                                <span class="hidden-xs">Completed Tasks</span>
                            </a>
                        </li>
                        @if(Auth::user()->hasRole('Admin'))
                            <li class="user_maintenance">
                                <a id="user_maintenance" onclick="get_user_list('list_view')" style="cursor: pointer;">
                                    <span class="visible-xs"><i data-toggle="tooltip" title="User Maintenance" class="fa fa-folder-open-o"></i></span>
                                    <span class="hidden-xs">User Maintenance</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
