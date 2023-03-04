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
                    <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-8 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Thông tin hoạt động giám sát</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('giam-sat.store')}}" id="upload_vanban">
                        @csrf
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-12">
                            <label for="inputTen" class="col-form-label">Tên Hoạt động giám sát</label>
                            <input type="text" placeholder="Nhập tên hoạt động giám sát"  name="ten" class="form-control @error('ten') is-invalid @enderror" value="{{old('ten')}}" id="inputTen">
                            @error('ten')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="thoi_gian_star" class="col-form-label">Thời gian bắt đầu</label>
                            <input type="date" placeholder="Nhập thời gian tổ chức"  name="thoi_gian_star" class="form-control @error('thoi_gian_star') is-invalid @enderror" value="{{old('thoi_gian_star')}}" id="thoi_gian_star">
                            @error('thoi_gian_star')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="thoi_gian_end" class="col-form-label">Thời gian kết thúc</label>
                            <input type="date" placeholder="Nhập thời gian tổ chức"  name="thoi_gian_end" class="form-control @error('thoi_gian_end') is-invalid @enderror" value="{{old('thoi_gian_end')}}" id="thoi_gian_end">
                            @error('thoi_gian_end')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label class="col-form-label">Nội dung giám sát</label>
                            <textarea name="noi_dung" id="noi_dung" rows="3" class="form-control @error('noi_dung') is-invalid @enderror">{{old('noi_dung')}}</textarea>
                            @error('noi_dung')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Bấm chọn hoặc kéo thả file văn bản vào ô bên dưới</label>
                            <input id="OurFile" type="file" name="OurFile" accept="application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"  multiple>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="trang_thai" checked type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">Hiển thị</label>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{route('van-ban.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Lưu và thoát</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('js')
<link href="{{asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script>
    
    $('#OurFile').FancyFileUpload({
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#upload_vanban').find('input[name="_token"]').first().val(),
            atc     :   'upload_vanban_giamsat' 
        },
        maxfilesize: 10000000,
        edit:true
    });
    CKEDITOR.replace( 'noi_dung', {
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Font', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
            { name: 'insert', items: ['Table' ] },
        ],
        language: 'vi',
        skin: 'moono-lisa',
    });
</script>
@endsection