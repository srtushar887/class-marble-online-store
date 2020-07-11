<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 03:53:45 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Lunoz - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/')}}/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/theme.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">

            <div class="d-flex align-items-left">

            </div>

            <div class="d-flex align-items-center">





                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/admin/')}}/images/users/avatar-3.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            Profile
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="javascript:void(0)">
                            <span>Change Password</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <div class="navbar-brand-box">
                <a href="index.html" class="logo">
                    <img src="{{asset('assets/admin/')}}/images/logo-light.png" />
                </a>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('home')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="" class="waves-effect"><i class='bx bx-home-smile'></i><span>My Order</span></a>
                    </li>
                    <li>
                        <a href="{{route('my.profile')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>My Profile</span></a>
                    </li>
                    <li>
                        <a href="" class="waves-effect"><i class='bx bx-home-smile'></i><span>Billing Address</span></a>
                    </li>

                    <li>
                        <a href="" class="waves-effect"><i class='bx bx-home-smile'></i><span>Logout</span></a>
                    </li>






                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('user')

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        2020 © Lunoz.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Myra
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Overlay-->
<div class="menu-overlay"></div>


<!-- jQuery  -->
<script src="{{asset('assets/admin/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/metismenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/waves.js"></script>
<script src="{{asset('assets/admin/')}}/js/simplebar.min.js"></script>

<!-- Morris Js-->
<script src="{{asset('assets/admin/')}}/plugins/morris-js/morris.min.js"></script>
<!-- Raphael Js-->
<script src="{{asset('assets/admin/')}}/plugins/raphael/raphael.min.js"></script>

<!-- Morris Custom Js-->
<script src="{{asset('assets/admin/')}}/pages/dashboard-demo.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 03:54:13 GMT -->
</html>
