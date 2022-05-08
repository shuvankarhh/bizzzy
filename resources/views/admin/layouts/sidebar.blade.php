<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Bizzzy Admin
            </span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{ asset('/admin/images/img.jpg') }}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ Auth::user()->name }}</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a href="{{ route('admin.dash') }}"><i class="fa fa-home"></i> Dashboard </a>
                    {{-- <ul class="nav child_menu">
                        <li><a href="{{ route('admin.dash') }}">Dashboard</a></li>
                    </ul> --}}
                </li>
                <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> Users <span
                            class=""></span></a>
                    {{-- <ul class="nav child_menu">
                        <li><a href="form.html">All User List</a></li>
                        <li><a href="form_advanced.html">Advanced Components</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
                        <li><a href="form_wizards.html">Form Wizard</a></li>
                        <li><a href="form_upload.html">Form Upload</a></li>
                        <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul> --}}
                </li>
                <li><a href="{{ route('staff.index') }}"><i class="fa fa-user"></i> Staff</a>
                    {{-- <ul class="nav child_menu">
                        <li><a href="general_elements.html">General Elements</a></li>
                        <li><a href="media_gallery.html">Media Gallery</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="glyphicons.html">Glyphicons</a></li>
                        <li><a href="widgets.html">Widgets</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="inbox.html">Inbox</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                    </ul> --}}
                </li>
                <li><a href="{{ route('job.index') }}"><i class="fa fa-briefcase"></i> Jobs </a></li>
                <li><a href="{{ route('skill.index') }}"><i class="fa fa-desktop"></i> Skills </a></li>
                <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-list"></i>Job Category </a></li>
                {{-- <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="chartjs.html">Chart JS</a></li>
                        <li><a href="chartjs2.html">Chart JS2</a></li>
                        <li><a href="morisjs.html">Moris JS</a></li>
                        <li><a href="echarts.html">ECharts</a></li>
                        <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                </li> --}}
                {{-- <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>


    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    {{-- <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div> --}}
    <!-- /menu footer buttons -->
</div>
