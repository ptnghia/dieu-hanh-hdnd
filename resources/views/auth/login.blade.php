@extends('layouts.app')

@section('content')
<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-3 text-center text_login">
                            <img src="assets/images/favicon-32x32.png" width="100" alt="" />
                            <div class="mt-3">PHẦN MỀM ĐIỀU HÀNH CỦA HĐND TỈNH BÌNH THUẬN</div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="title_login">ĐĂNG NHẬP HỆ THỐNG</h3>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email đăng nhập</label>
                                                <input id="email" type="email" class="form-control size-14 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Nhập email hoặc tên đăng nhập" />
                                                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <i>{{ $message }}</i>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Mật khẩu</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input id="password" type="password" class="form-control size-14 @error('password') is-invalid @enderror" name="password" placeholder="Nhập mật khẩu" />
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <i>{{ $message }}</i>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Ghi nhớ đăng nhập</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">Quên mật khẩu ?</a>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                    <i class="bx bxs-lock-open"></i>Đăng nhập
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {
          $("#show_hide_password a").on("click", function (event) {
            event.preventDefault();
            if ($("#show_hide_password input").attr("type") == "text") {
              $("#show_hide_password input").attr("type", "password");
              $("#show_hide_password i").addClass("bx-hide");
              $("#show_hide_password i").removeClass("bx-show");
            } else if (
              $("#show_hide_password input").attr("type") == "password"
            ) {
              $("#show_hide_password input").attr("type", "text");
              $("#show_hide_password i").removeClass("bx-hide");
              $("#show_hide_password i").addClass("bx-show");
            }
          });
        });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

@endsection
