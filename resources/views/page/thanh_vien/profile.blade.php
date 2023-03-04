@extends('layouts.main')

@section('css_file')

@endsection

@section('css')
<style>
</style>    
@endsection

@section('content')
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Thông tin cá nhân</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <form method="POST" class="position-relative" onsubmit="return false"  action="{{ route('ajax')}}" enctype="multipart/form-data" id="avata-form">
                            @csrf
                            <img id="output" src="{{asset(Auth::user()->hinh_anh!=''? Auth::user()->hinh_anh : 'uploads/images/user.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <span class=" position-absolute btn-avatar">
                                <input type="file" onchange="loadFile(event)" accept="image/*" name="file" id="avata" />
                                <span class="text load_avatar"><i class="bx bx-image-add"></i></span>
                            </span>
                        </form>
                        <div class="mt-3">
                            <h4>{{Auth::user()->name}}</h4>
                            <p class="text-secondary mb-1">{{$chuc_vu}}</p>
                            <p class="text-muted font-size-sm">{{Auth::user()->dia_chi}}</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg style="margin-top: -1px;color: #008cff;display: inline-block;margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg> Email 
                            </h6>
                            <span class="text-secondary">{{Auth::user()->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg style="margin-top: -1px;color: #008cff;display: inline-block;margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg> Điện thoại
                            </h6>
                            <span class="text-secondary">{{Auth::user()->dien_thoai}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"> 
                                <img src="{{asset('assets/images/zalo-icon.png')}}" style="height: 16px;margin-right: 5px;" alt="zalo" srcset="">
                                Zalo
                            </h6>
                            <span class="text-secondary">{{Auth::user()->zalo}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{old('ten') ?? Auth::user()->name}}" name="name" placeholder="Nhập họ và tên">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control  @error('ngay_sinh') is-invalid @enderror" value="{{old('ngay_sinh') ?? Auth::user()->ngay_sinh}}" name="ngay_sinh"  placeholder="Nhập ngày sinh">
                            @error('ngay_sinh')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Giới tính</label>
                            <select class=" form-control" name="gioi_tinh">
                                <option {{old('chuc_vu_id')== 'Nam' ? 'selected' : ''}} value="Nam">Nam</option>
                                <option {{old('chuc_vu_id')== 'Nữ' ? 'selected' : ''}} value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" disabled name="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email') ?? Auth::user()->email}}" placeholder="Nhập email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control  @error('dien_thoai') is-invalid @enderror" name="dien_thoai" value="{{old('dien_thoai') ?? Auth::user()->dien_thoai}}" placeholder="Nhập số điện thoại">
                            @error('dien_thoai')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Số zalo</label>
                            <input type="text" class="form-control  @error('zalo') is-invalid @enderror" name="zalo" value="{{old('zalo') ?? Auth::user()->zalo}}" placeholder="Nhập số zalo">
                            @error('zalo')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control @error('dia_chi') is-invalid @enderror" value="{{old('dia_chi') ?? Auth::user()->dia_chi}}" name="dia_chi" placeholder="Nhập địa chỉ">
                            @error('dia_chi')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Giới thiệu</label>
                            <textarea class="form-control" name="gioi_thieu" placeholder="Nhập giới thiệu" rows="3">{{old('gioi_thieu') ?? Auth::user()->gioi_thieu}}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-3"><i class="bx bx-save"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h5 class="mb-0"><i class="bx bx-refresh" style="font-size: 24px;position: relative;top: 5px;"></i> Đổi mật khẩu</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.updatePassword')}}" >
                        @csrf
                        <div class="row mb-3">
                            <label for="current_password" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror " name="current_password" id="current_password" placeholder="Nhập mật khẩu cũ">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_password" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror " name="new_password" id="new_password" placeholder="Nhập mật khẩu mới">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="new_confirm_password" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror " name="new_confirm_password" id="new_confirm_password" placeholder="Nhập mật khẩu cũ">
                                @error('new_confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="bx bx-save"></i> Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('js')
<script>
    var  sound_Path='{{asset('assets/plugins/notifications/sounds/')}}/'
</script>
<link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" />
<script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
<script>
    var loadFile = function(event) {
        $('.load_avatar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>');
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

        var formData = new FormData();
        formData.append('file', $('#avata')[0].files[0]);
        formData.append('_token', '{{csrf_token()}}');
        formData.append('atc', 'upload_avata'); 
        $.ajax({
            url: $("#avata-form").attr('action'), // URL của route trong Laravel để xử lý file
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if(data==='1'){
                    Lobibox.notify('success', {
                        pauseDelayOnHover: true,
                        size: 'mini',
                        rounded: true,
                        icon: 'bx bx-check-circle',
                        delayIndicator: false,
                        sound: 'sound2', 
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        msg: 'Cập nhật thành công'
                    });
                }else{
                    Lobibox.notify('error', {
                        pauseDelayOnHover: true,
                        continueDelayOnInactiveTab: false,
                        position: 'top right',
                        icon: 'bx bx-x-circle',
                        sound: 'sound1',  
                        msg: 'Đã xảy ra lỗi'
                    });
                }
                $('.load_avatar').html('<i class="bx bx-image-add"></i>');
            }
        });
        
    };
    @if (session('success'))
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bx bx-check-circle',
        delayIndicator: false,
        sound: 'sound2', 
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: '{{session('success')}}'
    });
    @endif
    @if (session('errors'))
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        icon: 'bx bx-x-circle',
        sound: 'sound2',  
        msg: '{{session('errors')}}'
    });
    @endif
</script>
@endsection