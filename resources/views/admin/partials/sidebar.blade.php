            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                            <!-- <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="index.html" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Dashboard 1</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="dashboard_2.html" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Dashboard 2</span>
                                        <span class="badge badge-success">1</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="dashboard_3.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Dashboard 3</span>
                                        <span class="badge badge-danger">5</span>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <!-- <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-docs"></i>
                                <span class="title">Applications</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                            <li class="nav-item  ">
                                    <a href="{{ route('admin.completed') }}" class="nav-link ">
                                        <i class="icon-check"></i>
                                        <span class="title">Completed</span>
                                    </a>
                                </li>                            
                                <li class="nav-item  ">
                                    <a href="app_todo.html" class="nav-link ">
                                        <i class="icon-clock"></i>
                                        <span class="title">Incomplete</span>
                                    </a>
                                </li>
                            </ul>
                        </li>   -->
                        @if( Auth::guard('official')->check() )
                            <li class="nav-item  ">
                                <a href="{{ route('official.completed') }}" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title">Applications</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>  

                        @else                         
                            <li class="nav-item  ">
                                <a href="{{ route('admin.completed') }}" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title">Applications</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>                          
                            <li class="nav-item  ">
                                <a href="{{ route('admin.processed') }}" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title">Processed</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>  
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title">Expired Applications</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>         
                        @endif                                                                     
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>