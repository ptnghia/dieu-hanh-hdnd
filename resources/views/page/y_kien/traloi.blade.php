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
                    <li class="breadcrumb-item active" aria-current="page">Trả lời ý kiến cử tri</li>
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
                        <h5 class="mb-0 text-primary">Trả lời ý kiến cử tri</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('y-kien-cu-tri.tra-loi.traloi',$dataId->id)}}" id="upload_vanban">
                        @csrf
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="d-flex align-items-center">
                            <div class="text-center khieu_nai_item_left">
                                <img src="{{asset($dataId->hinh_anh)}}" class="rounded-circle p-1 border" width="90" height="90" alt="{{$dataId->name}}">
                                <h5 class=" size-14" style="white-space: nowrap;">{{$dataId->name}}</h5>
                            </div>
                            
                            <div class="flex-grow-1 ms-3 khieu_nai_item_right">
                                <h5 class="mt-0 size-16">{{$dataId->tieu_de}}</h5>
                                <div class="mb-3"><i class="bx bx-calendar"></i> {{date('d/m/Y', strtotime($dataId->ngay_y_kien))}}  - <i class="bx bx-purchase-tag"></i> {{$dataId->ten}}</div>
                                <div class="mb-3">
                                    {!!$dataId->noi_dung_y_kien!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Trả lời khiếu nại - tố cáo</label>
                            <textarea name="noi_dung_tra_loi" id="mytextarea" rows="3" class="form-control @error('noi_dung_tra_loi') is-invalid @enderror">{{old('noi_dung_tra_loi') ?? $dataId->noi_dung_tra_loi}}</textarea>
                            @error('noi_dung_tra_loi')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>

                        <div class="text-end">
                            <a href="{{route('van-ban.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Trả lời</button>
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
            atc     :   'upload_vanban_y_kien' 
        },
        maxfilesize: 3000000,
        edit:true
    });

    CKEDITOR.replace( 'noi_dung_tra_loi', {
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