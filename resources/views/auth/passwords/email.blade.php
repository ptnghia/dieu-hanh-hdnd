@extends('layouts.app')

@section('content')
<body class="bg-forgot">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box">
                <div class="card-body">
                    <div class="p-4 rounded  border">
                        <div class="text-center">
                            <img src="{{asset('assets/images/icons/forgot-2.png')}}" width="120" alt="" />
                        </div>
                        <h4 class="mt-5 font-weight-bold title_login">Quên mật khẩu?</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="text-muted">Nhập email đã đăng ký để dặt lại mật khẩu</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="my-4">
                                <label class="form-label">Email</label>
                                <input id="email" type="email" class="form-control size-14 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@user.com" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-md size-14">Gửi yêu cầu</button> <a href="login.html" class="btn btn-light btn-md size-14"><i class='bx bx-arrow-back me-1'></i>Quay lại đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>
@endsection
