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
        <div class="breadcrumb-title pe-3">{{$data_fix['module']['name']}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sửa thông tin</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-8">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Sửa thong tin thành viên mới</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route($data_fix['module']['slug'].'.update', $dataId->id)}}">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$dataId->id}}" />
                        <div class="col-md-6">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{old('name') ?? $dataId->name }}" name="name" placeholder="Nhập họ và tên">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control  @error('ngay_sinh') is-invalid @enderror" value="{{old('ngay_sinh') ?? $dataId->ngay_sinh}}" name="ngay_sinh"  placeholder="Nhập ngày sinh">
                            @error('ngay_sinh')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Giới tính</label>
                            <select class=" form-control" name="gioi_tinh">
                                <option {{$dataId->ngay_sinh=='Nam' ? 'selected' : ''}} value="Nam">Nam</option>
                                <option {{$dataId->ngay_sinh=='Nữ' ? 'selected' : ''}}  value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control  @error('dien_thoai') is-invalid @enderror" name="dien_thoai" value="{{old('dien_thoai') ?? $dataId->dien_thoai }}" placeholder="Nhập số điện thoại">
                            @error('dien_thoai')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Số zalo</label>
                            <input type="text" class="form-control  @error('zalo') is-invalid @enderror" name="zalo" value="{{old('zalo') ?? $dataId->zalo }}" placeholder="Nhập số zalo">
                            @error('zalo')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Chức vụ</label>
                            <select class="form-control  @error('chuc_vu_id') is-invalid @enderror" name="chuc_vu_id">
                                @foreach ($chucvus as $item )
                                <option {{$dataId->chuc_vu_id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->ten}}</option>
                                @endforeach
                            </select>
                            @error('chuc_vu_id')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control @error('dia_chi') is-invalid @enderror" value="{{old('dia_chi') ?? $dataId->dia_chi}}" name="dia_chi" placeholder="Nhập địa chỉ">
                            @error('dia_chi')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Giới thiệu</label>
                            <textarea class="form-control" name="gioi_thieu" placeholder="Nhập giới thiệu" rows="3">{{old('gioi_thieu')  ?? $dataId->gioi_thieu }}</textarea>
                        </div>
                        <h5 class="title-form"><span>Thông tin đăng nhập</span></h5>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email') ?? $dataId->email }}" placeholder="Nhập email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mật khẩu</label>
                            <input type="text" name="password" class="form-control  is-invalid " value="{{old('password')}}" placeholder="Nhập mật khẩu">
                            <span class="invalid-feedback" role="alert">
                                <i>Chỉ nhập khi muốn thây đổi mật khẩu</i>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nhóm phân quyền</label>
                            <select class="form-control  @error('permissions_id') is-invalid @enderror" name="permissions_id">
                                @foreach ($permissions as $item )
                                <option {{$dataId->permissions_id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('permissions_id')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>                        
                        <hr class="mt-4">
                        <div class="text-end">
                            <a href="{{route($data_fix['module']['slug'].'.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('js')
@endsection