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
                    <li class="breadcrumb-item active" aria-current="page">Sửa thông tin hoạt động giám sát</li>
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
                        <h5 class="mb-0 text-primary">Chi tiết hoạt động giám sát</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route($data_fix['module']['slug'].'.update', $dataId->id)}}" id="upload_vanban">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$dataId->id}}" />
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-12">
                            <label for="inputTen" class="col-form-label">Tên kỳ họp</label>
                            <input type="text" placeholder="Nhập tên hoạt động giám sát"  name="ten" class="form-control @error('ten') is-invalid @enderror" value="{{old('ten') ?? $dataId->ten}}" id="inputTen">
                            @error('ten')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="thoi_gian_star" class="col-form-label">Thời gian bắt đầu</label>
                            <input type="date" placeholder="Nhập thời gian bắt đầu"  name="thoi_gian_star" class="form-control @error('thoi_gian_star') is-invalid @enderror" value="{{old('thoi_gian_star') ?? $dataId->thoi_gian_star}}" id="thoi_gian_star">
                            @error('thoi_gian_star')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="thoi_gian_end" class="col-form-label">Thời gian kết thúc</label>
                            <input type="date" placeholder="Nhập thời gian bắt đầu"  name="thoi_gian_end" class="form-control @error('thoi_gian_end') is-invalid @enderror" value="{{old('thoi_gian_end') ?? $dataId->thoi_gian_end}}" id="thoi_gian_end">
                            @error('thoi_gian_end')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Nội dung cuộc họp</label>
                            <textarea name="noi_dung" id="mytextarea" rows="3" class="form-control @error('noi_dung') is-invalid @enderror">{{old('noi_dung') ?? $dataId->noi_dung}}</textarea>
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
                                <input class="form-check-input" name="trang_thai" value="1" {{$dataId->trang_thai== 1 ?'checked':''}}  type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">Hiển thị</label>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{route('van-ban.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Văn bản - tài liệu cho kỳ họp</h5>
                    </div>
                    <hr>
                    @foreach ($files as $file)
                        <div class="d-flex item-file mb-3" id="item-file_{{$file->id}}">
                            <div class="item_file_ext">{{$file->file_ext}}</div>
                            <div class="item_file_name">
                                <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{$file->ten =='' ? $file->file_name : $file->ten}}</div>
                                <a href="{{asset($file->file_url)}}" target="_blank">Xem file</a>
                                <button type="button" class="btn btn-sm btn-danger btn-xs" onclick="del_file_vb({{$file->id}})"><i class="bx bx-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
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
    
    $('#OurFile').FancyFileUpload({
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#upload_vanban').find('input[name="_token"]').first().val(),
            atc     :   'upload_vanban_giamsat' 
        },
        maxfilesize: 10000000,
        edit:true
    });
    
    function del_file_vb(id){
        
        swal({
            title: "Xác nhận xóa file văn bản?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                 data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'del_file_vb_kyhop',
                    id      :   id
                },
                success : function (result){
                    $('#item-file_'+id).remove();
                }
            });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }
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