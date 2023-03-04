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
                        <h5 class="mb-0 text-primary">Thêm kỳ họp mới</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('ky-hop.store')}}" id="upload_vanban">
                        @csrf
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-12">
                            <label for="inputTen" class="col-form-label">Tên kỳ hợp</label>
                            <input type="text" placeholder="Nhập tên kỳ họp"  name="ten" class="form-control @error('ten') is-invalid @enderror" value="{{old('ten')}}" id="inputTen">
                            @error('ten')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="thoi_gian" class="col-form-label">Thời gian tổ chức</label>
                            <input type="date" placeholder="Nhập thời gian tổ chức"  name="thoi_gian" class="form-control @error('thoi_gian') is-invalid @enderror" value="{{old('thoi_gian')}}" id="thoi_gian">
                            @error('thoi_gian')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="hinh_thuc" class="col-form-label">Hình thức tổ chức</label>
                            <select class=" form-control" name="hinh_thuc">
                                <option {{old('hinh_thuc')== '0' ? 'selected' : ''}} value="0">Cả hai hình thức</option>
                                <option {{old('hinh_thuc')== '1' ? 'selected' : ''}} value="1">Họp trực tiếp</option>
                                <option {{old('hinh_thuc')== '2' ? 'selected' : ''}} value="1">Họp online</option>
                            </select>
                            @error('hinh_thuc')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="dia_diem" class="col-form-label">Địa điểm tổ chức</label>
                            <input type="text" placeholder="Nhập thời gian tổ chức" name="dia_diem" class="form-control @error('dia_diem') is-invalid @enderror" value="{{old('dia_diem')}}" id="dia_diem">
                            @error('dia_diem')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="co_quan" class="col-form-label">Cơ quan tổ chức</label>
                            <input type="text"  name="co_quan" placeholder="" class="form-control @error('co_quan') is-invalid @enderror" value="{{old('co_quan')}}" id="co_quan">
                            @error('co_quan')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="ly_do" class="col-form-label">Lý do họp</label>
                            <input type="text" placeholder="Nhập thời gian tổ chức"  name="ly_do" class="form-control @error('ly_do') is-invalid @enderror" value="{{old('ly_do')}}" id="ly_do">
                            @error('ly_do')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Nội dung cuộc họp</label>
                            <textarea name="noi_dung_hop" id="mytextarea" rows="3" class="form-control @error('noi_dung_hop') is-invalid @enderror">{{old('noi_dung_hop')}}</textarea>
                            @error('noi_dung_hop')
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
            atc     :   'upload_vanban_kyhop' 
        },
        maxfilesize: 10000000,
        edit:true
    });
    CKEDITOR.replace( 'noi_dung_hop', {
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