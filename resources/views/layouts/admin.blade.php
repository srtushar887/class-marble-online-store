<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 03:53:45 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
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
                        @if (!empty(Auth::user()->image))
                            <img class="rounded-circle header-profile-user" src="{{asset(Auth::user()->image)}}"
                                 alt="Header Avatar">
                        @else
                            <img class="rounded-circle header-profile-user" src="https://cdn2.vectorstock.com/i/thumb-large/23/81/default-avatar-profile-icon-vector-18942381.jpg"
                                 alt="Header Avatar">
                        @endif

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
                           href="{{route('admin.logout')}}">
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <div class="navbar-brand-box">
                <a href="{{route('admin.dashboard')}}" class="logo">
                    <img src="{{asset($gn->logo)}}" style="height: 58px;width: 168px;" />
                </a>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('admin.dashboard')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{route('admin.general.settings')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>General Settings</span></a>
                    </li>


                    <li>
                        <a href="{{route('admin.category')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Items</span></a>
                    </li>

                    <li>
                        <a href="{{route('admin.tag')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Collections</span></a>
                    </li>

                    <li>
                        <a href="{{route('admin.product')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Product</span></a>
                    </li>


                    <li>
                        <a href="{{route('admin.users')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Users</span></a>
                    </li>


                    <li>
                        <a href="{{route('admin.order')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>User Order</span></a>
                    </li>

                    <li>
                        <a href="{{route('admin.jobs')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Job Management</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.jobs.user')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Applied Job User</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.virtialtoure.user')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Virtual Tour User</span></a>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Frontend Control</span></a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.slider')}}">Home Header</a></li>
                            <li><a href="{{route('admin.home.partner')}}">Home Partner Section</a></li>
                            <li><a href="{{route('admin.about.us')}}">About Us</a></li>
                            <li><a href="{{route('admin.contact.us')}}">Contact Us</a></li>
                            <li><a href="{{route('admin.faq')}}">Faq</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin.newslatter')}}" class="waves-effect"><i class='bx bx-home-smile'></i><span>Newslatter Email</span></a>
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

                @yield('admin')

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                            $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$date}} © {{$gn->site_name}}.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">

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
