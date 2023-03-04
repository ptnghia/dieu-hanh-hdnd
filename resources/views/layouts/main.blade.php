<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png"/>
        <title> {{$data_fix['module']['name']}} - Phần mềm điều hành của HĐND tỉnh Bình Thuận</title>
        <!--plugins-->
        
        <link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
        @yield('css_file')
        <!-- loader-->
        <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet"/>
        <script src="{{asset('assets/js/pace.min.js')}}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
        <!-- Theme Style CSS -->
        <!--link rel="stylesheet" href="assets/css/dark-theme.css"/>
        <link rel="stylesheet" href="assets/css/semi-dark.css"/-->
        <link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}"/>
        @yield('css')
    </head>
    <body>
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            @section('sidebar')
                @if (Auth::user()->permissions_id==1)
                @include('layouts.sidebar_daibieu')
                @elseif(Auth::user()->permissions_id==2)
                @include('layouts.sidebar_canbo')
                @else
                @include('layouts.sidebar_admin')
                @endif
            @show
            <!--end sidebar wrapper -->
            <!--start header -->
            @section('header')
                @include('layouts.header')
            @show
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                @yield('content')
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>
        </div>
        <!--end wrapper-->
        <!-- Bootstrap JS -->
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <!--plugins-->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script>
        @yield('js')
        <!--app JS-->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script>
            $('.confirm_delete').click(function () { 
                var id = $(this).attr('data_id');
                swal({
                    title: "Xác nhận xóa dữ liệu?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#del_form_'+id).submit();
                    } else {
                        //swal("Your imaginary file is safe!");
                    }
                });
            });
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        </script>
    </body>
</html>