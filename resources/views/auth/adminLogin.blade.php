
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 03:56:42 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary">

<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center min-vh-100">
                    <div class="w-100 d-block my-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center mb-4 mt-3">
                                            <a href="index.html">
                                                <span><img src="{{asset($gn->logo)}}" style="height: 87px;width: 217px;" alt="" ></span>
                                            </a>
                                        </div>
                                        <form action="{{route('admin.login.submit')}}" method="post" class="p-2">
                                            @csrf
                                            <div class="form-group">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="john@deo.com">
                                            </div>
                                            <div class="form-group">
                                                <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>
                                                <label for="password">Password</label>
                                                <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                            </div>

                                            <div class="mb-3 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->


                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- end .w-100 -->
                </div> <!-- end .d-flex -->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- jQuery  -->
<script src="{{asset('assets/admin/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/metismenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/waves.js"></script>
<script src="{{asset('assets/admin/')}}/js/simplebar.min.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

</body>


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 03:56:42 GMT -->
</html>
