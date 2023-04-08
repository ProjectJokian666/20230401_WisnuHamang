<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel MATRIX ADMIN">
    <meta name="author" content="KOI FISH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    @yield('css')
</head>
<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{url('home')}}">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                           <!-- dark Logo text -->
                           <img src="{{asset('admin/assets/images/logo-text.png')}}" alt="homepage" class="light-logo" />
                       </span>
                       <!-- Logo icon -->
                       <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item text-white justify-content-center align-items-center d-flex no-block">
                            {{Auth()->user()->name}}
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('admin/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31">
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>

            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                                <i class="mdi mdi-home"></i><span class="hide-menu">{{ __('Home') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i><span class="hide-menu">Menu </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{url('aphbs')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> APHB </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('cvs')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> CV </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('hibahs')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Hibah </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('jualBelis')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Jual Beli </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('nibs')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> NIB </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('pecahSertifikats')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Pecah Sertifikat </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('penyertifikatans')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Penyertifikatan </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('petaBidangs')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Peta Bidang </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('pts')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> PT </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('royas')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Roya </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('siups')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> SIUP </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('wariss')}}" class="sidebar-link">
                                        <i class="mdi mdi-note"></i><span class="hide-menu"> Waris </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('report') }}" aria-expanded="false">
                                <i class="mdi mdi-clipboard"></i><span class="hide-menu">{{ __('Report') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('chat') }}" aria-expanded="false">
                                <i class="mdi mdi-comment"></i><span class="hide-menu">{{ __('Chat') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('service') }}" aria-expanded="false">
                                <i class="mdi mdi-key"></i><span class="hide-menu">{{ __('Manage Service') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users') }}" aria-expanded="false">
                                <i class="mdi mdi-account-multiple"></i><span class="hide-menu">{{ __('Manage User') }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('main-content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <span>Copyright &copy; e-Notaris 2021</span>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{ asset('admin/dist/js/waves.js') }}"></script>
    <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script>

    @include('sweetalert::alert')
    @yield('js')
</body>
</html>
