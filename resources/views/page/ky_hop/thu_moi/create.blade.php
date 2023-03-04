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
                    <li class="breadcrumb-item active" aria-current="page">Tạo thư mời họp</li>
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
                        <h5 class="mb-0 text-primary">Nội dung thư mời</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('thu-moi.store',$id)}}" id="upload_vanban" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-12">
                            <label for="inputTen" class="col-form-label">Tên kỳ hợp</label>
                            <input type="text"  readonly name="ten" class="form-control" value="{{$data_kyhhop->ten}}" id="inputTen">
                            @error('ten')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <label for="so" class="col-form-label">Số hiệu thư mời</label>
                            <input type="text" placeholder="Nhập số hiệu thư mời"  name="so" class="form-control @error('so') is-invalid @enderror" value="{{old('so')}}" id="so">
                            @error('so')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <label for="dia_diem" class="col-form-label">Địa điểm</label>
                            <input type="text" placeholder="Nhập địa điểm"  name="dia_diem" class="form-control @error('dia_diem') is-invalid @enderror" value="{{old('dia_diem')}}" id="dia_diem">
                            @error('dia_diem')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <label for="thoi_gian" class="col-form-label">Thời gian</label>
                            <input type="date" placeholder="Nhập thời gian"  name="thoi_gian" class="form-control @error('thoi_gian') is-invalid @enderror" value="{{old('thoi_gian')}}" id="thoi_gian">
                            @error('thoi_gian')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="co_quan_ky" class="col-form-label">Cơ quan - chức vụ ký tên</label>
                            <input type="text" placeholder="Nhập Cơ quan - chức vụ ký tên" name="co_quan_ky" class="form-control @error('co_quan_ky') is-invalid @enderror" value="{{old('co_quan_ky')}}" id="co_quan_ky">
                            @error('co_quan_ky')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="nguoi_ky" class="col-form-label">Họ tên người ký thư mời</label>
                            <input type="text"  name="nguoi_ky" placeholder="" class="form-control @error('nguoi_ky') is-invalid @enderror" value="{{old('nguoi_ky')}}" id="nguoi_ky">
                            @error('nguoi_ky')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="noi_nhan" class="col-form-label">Nơi nhận</label>
                            <textarea name="noi_nhan" id="noi_nhan" rows="3" class="form-control @error('noi_nhan') is-invalid @enderror">{{old('noi_nhan')}}</textarea>
                            @error('noi_nhan')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Nội dung thư mời</label>
                            <textarea name="noi_dung" rows="3" class="form-control @error('noi_dung') is-invalid @enderror">{{old('noi_dung')}}</textarea>
                            @error('noi_dung')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">File hình con dấu và chữ ký</label>
                            <input type="file" name="file" class=" form-control  @error('file') is-invalid @enderror"" accept="image/png, image/jpeg">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <a href="{{route('ky-hop.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Lưu thư mời</button>
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
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script>
    
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>
<script>
    
    $('#OurFile').FancyFileUpload({
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#upload_vanban').find('input[name="_token"]').first().val(),
            atc     :   'upload_vanban_kyhop' 
        },
        maxfilesize: 3000000,
        edit:false
    });
    CKEDITOR.replace( 'noi_dung', {
        toolbar: [
            { name: 'document', items: [ 'Print' ] },
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
            { name: 'insert', items: ['Table' ] },
            { name: 'tools', items: [ 'Maximize' ] },
        ],
        language: 'vi',
        skin: 'moono-lisa',
    });
</script>
@endsection