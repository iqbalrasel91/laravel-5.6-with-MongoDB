<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{!! asset('admin_assets/img/favicon.png') !!}" type="image/x-icon"/>
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Menu CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') !!}"
          rel="stylesheet">
    <!-- morris CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/morrisjs/morris.css') !!}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{!! asset('admin_assets/css/animate.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('admin_assets/css/style.css') !!}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{!! asset('admin_assets/css/colors/blue.css') !!}" id="theme" rel="stylesheet">
    <!-- data table CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.css') !!}"
          rel="stylesheet" type="text/css"/>

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Date Picker -->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/datepicker/datepicker3.css') !!}">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="{!! asset('admin_assets/plugins/bower_components/daterangepicker/daterangepicker-bs3.css') !!}">
    <!-- time picker-->
    <link rel="stylesheet"
          href="{!! asset('admin_assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.css') !!}">
    <!-- summernotes CSS -->
    <link href="{!!  asset('admin_assets/plugins/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />
    <!-- select 2 -->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/select2/select2.min.css') !!}">
    <!-- toast CSS -->
    <script src="{!! asset('admin_assets/plugins/bower_components/custom-toastr/toastr.min.js')!!}"></script>
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/custom-toastr/toaster.css') !!}">
    <!-- sweetalert-->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/sweetalert/sweetalert.css') !!}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <script src="{!! asset('admin_assets/plugins/bower_components/jquery/dist/jquery.min.js')!!}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="{!! asset('css/custom.css') !!}" rel="stylesheet">
    <script type="text/javascript">
        var base_url = "{{ url('/').'/' }}";
    </script>
</head>

<body class="fix-header" onload="addMenuClass()">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="{{url('dashboard')}}">
                    <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon-->
                        <img style="width: 152px;margin-left: 26px;    margin-top: 12px;"
                                                          src="{!! asset('admin_assets/img/logo.png') !!}" alt="home"
                                                          class="dark-logo"/>
                    </b>
                    <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text-->
                     </span> </a>
            </div>
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->

            <ul class="nav navbar-top-links navbar-right pull-right">

                <li class="dropdown">
                    <?php
                     $employeeInfo = employeeInfo();
                    ?>

                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
                                src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" width="36"
                                class="img-circle"><b class="hidden-xs"><span class="hideMenu">{!!   $employeeInfo['name'] !!}</span></b><span
                                class="caret hideMenu"></span> </a>

                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href="{{url('changePassword')}}"><i class="ti-settings"></i> Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{URL::to('/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span>
                </h3></div>
            <div class="user-profile">
                <div class="dropdown user-pro-body">

                    <div><img src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" class="img-circle">
                    </div>

                    <a href="#" class="dropdown-toggle u-dropdown " data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><span class="hideMenu">{!!   $employeeInfo['name'] !!}</span> </a>

                </div>
            </div>
            <ul class="nav" id="side-menu">
                <li><a href="{{ url('dashboard') }}" class="waves-effect"><i class="mdi mdi-home hideMenu"  data-icon="v"></i> <span class="hide-menu hideMenu"> Dashboard  </span></a> </li>

                <li><a href="{{ route('user.index') }}" class="waves-effect"><i class="mdi mdi-account-multiple hideMenu"  data-icon="v"></i> <span class="hide-menu hideMenu"> Users  </span></a> </li>

            </ul>
        </div>
    </div>


    <div id="page-wrapper">
        @yield('content')
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center">
        {{date('Y')}} &copy; <strong><a href="#" target="_blank">Company Name</a>
        </strong> All rights reserved.
    </footer>
</div>

</div>
<!-- Bootstrap Core JavaScript -->

<script src="{!! asset('admin_assets/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{!! asset('admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}"></script>
<!--slimscroll JavaScript -->
<script src="{!! asset('admin_assets/js/jquery.slimscroll.js') !!}"></script>
<!--Wave Effects -->
<script src="{!! asset('admin_assets/js/waves.js') !!}"></script>
<!--Counter js -->
<script src="{!! asset('admin_assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/counterup/jquery.counterup.min.js') !!}"></script>
<!-- Sparkline chart JavaScript -->
<script src="{!! asset('admin_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') !!}"></script>
<!-- Custom Theme JavaScript -->
<script src="{!! asset('admin_assets/js/custom.min.js') !!}"></script>
<script src="{!! asset('admin_assets/js/dashboard1.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/toast-master/js/jquery.toast.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/sweetalert/sweetalert-dev.js') !!}"></script>
<!-- bootstrap-datepicker -->
<script src="{!! asset('admin_assets/plugins/bower_components/datepicker/bootstrap-datepicker.js')!!}"></script>
<!--TIme picker js-->
<script src="{!! asset('admin_assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')!!}"></script>
<!-- select2 -->
<script src="{!! asset('admin_assets/plugins/bower_components/select2/select2.full.min.js')!!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/summernote/dist/summernote.min.js') !!} "></script>
<script src="{!! asset('admin_assets/plugins/bower_components/toast-master/js/jquery.toast.js')!!}"></script>
<script src="{!! asset('admin_assets/js/toastr.js')!!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/custom-toastr/toastr.min.js')!!}"></script>
<!-- jquery-validator -->
<script type="text/javascript"
        src="{!! asset('admin_assets/plugins/bower_components/jquery-validator/jquery-validator.1.15.0.js')!!}"></script>
<script type="text/javascript"
        src="{!! asset('admin_assets/plugins/bower_components/jquery-validator/jquery-additional-method.1.15.0.min.js')!!}"></script>
<!-- Star Ratings -->
<script src="{!! asset('admin_assets/plugins/bower_components/rateyo/jquery.rateyo.js')!!}"></script>



<script>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
            @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif



    $(function () {
        $(".select2").select2();
        $('#myTable').DataTable({
            "ordering": true,
        });

    });
  
    jQuery(document).ready(function() {
        $('.summernote').summernote({
            height: 150, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        $('.inline-editor').summernote({
            airMode: true
        });
    });
    window.edit = function() {
        $(".click2edit").summernote()
    }, window.save = function() {
        $(".click2edit").destroy()
    }
   
    function addMenuClass() {
        var segment3 = '{{ Request::segment(1) }}';
        var url = base_url + segment3;
        // var navItem = $(this).find("[href='" + url + "']");

        $('a[href="' + url + '"]').parents('.treeview-menu').addClass('collapse in');
        $('a[href="' + url + '"]').parents('.treeview-menu').parent().children('.module').addClass('active');
    }

    $(".alert-success").delay(2000).fadeOut("slow");
    //   $(".alert-danger").delay(2000).fadeOut("slow");
    $(document).on("focus", ".yearPicker", function () {
        $(this).datepicker({
            format: 'yyyy',
            minViewMode: 2
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });
    $(document).on("focus", ".dateField", function () {
        $(this).datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            clearBtn: true
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });
    $(document).on("focus", ".timePicker", function () {
        $(this).timepicker({
            showInputs: false,
            minuteStep: 5
        });
    });
    $(".monthField").datepicker({
        format: "yyyy-mm",
        viewMode: "months",
        minViewMode: "months"
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $(document).on('click', '.delete', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: actionTo,
                        type: 'post',
                        data: {_method: 'delete', _token: token},
                        success: function (data) {
                            if (data == 'hasForeignKey') {
                                swal({
                                    title: "Oops!",
                                    text: "This data is used anywhere",
                                    type: "error"
                                });
                            } else if (data == 'success') {
                                swal({
                                        title: "Deleted!",
                                        text: "Your information delete successfully.",
                                        type: "success"
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
                                        }
                                    });
                            } else {
                                swal({
                                    title: "Deleted!",
                                    text: "Something Error Found !, Please try again.",
                                    type: "error"
                                });
                            }
                        }

                    });
                } else {
                    swal("Cancelled", "Your data is safe .", "error");
                }
            });
        return false;
    });


</script>
@yield('page_scripts')

</body>

</html>
