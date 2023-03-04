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
                        <h5 class="mb-0 text-primary">Khiếu nại tố cáo</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('khieu-nai.store')}}" id="upload_vanban">
                        @csrf
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-12 col-lg-8 col-md-8">
                            <label for="tieu_de" class="col-form-label">Tiêu đề khiếu nại - tố cáo</label>
                            <input type="text" placeholder="Nhập tiêu đề khiếu nại - tố cáo"  name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror" value="{{old('tieu_de')}}" id="tieu_de">
                            @error('tieu_de')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 form-select2 @error('chu_de_id') is-invalid @enderror">
                            <label for="loai_vanban_id" class="col-form-label">Chủ đề</label>
                            <select name="chu_de_id" class=" form-control single-select" id="chu_de_id">
                                <option value="0">Chọn chủ đề</option>
                                @foreach ($data_chude as $row)
                                <option value="{{$row->id}}">{{$row->ten}}</option>
                                @endforeach
                            </select>
                            @error('loai_vanban_id')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label class="col-form-label">Nội dung khiếu nại - tố cáo</label>
                            <textarea name="noi_dung_khieu_nai" id="mytextarea" rows="3" class="form-control @error('noi_dung_khieu_nai') is-invalid @enderror">{{old('noi_dung_khieu_nai')}}</textarea>
                            @error('noi_dung_khieu_nai')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Bấm chọn hoặc kéo thả file văn bản vào ô bên dưới</label>
                            <input id="OurFile" type="file" name="OurFile" accept="application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"  multiple>
                        </div>

                        <div class="text-end">
                            <a href="{{route('khieu-nai.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Lưu và thoát</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (Auth::user()->permissions_id>1)
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Chủ đề khiếu nại - tố cáo</h6>
                        </div>
                    </div>
                    <ul class="list_thongso_vb" id="list_thongso_vb">
                        <li class="form_add_thongso_vb ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nội dung" id="text">
                                <button class="btn btn-outline-secondary add_thongso_vb" type="button">Thêm mới</button>
                            </div>
                            <div class="thongbao thongbao"></div>
                        </li>
                        @foreach ($data_chude as $child)
                        <li class="item_thongso_vb" id="item_thongso_vb_{{$child->id}}">
                            <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="{{$child->ten}}" data_id="{{$child->id}}" />
                            <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="{{$child->id}}"><i class="bx bx-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit{{$child->id}}" style="display: none" ><i class="bx bx-check"></i></button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>   
        </div>
        @endif
        
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
    $('.add_thongso_vb').click(function(){
        var text = $('#text').val();
        if(text!==''){
            $('#text').val('');
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'add_chude_khieunai',
                    text    :   text
                },
                success : function (result){
                    $('#list_thongso_vb').append(result);
                    $('.thongbao').html('');
                    swal("Đã thêm "+text+ " !", {
                        icon: "success",
                        timer: 2000
                    });
                    $('#text').removeClass('is-invalid');
                    $('#text').focus();
                    $('.thongbao').html('');
                }
            });
        }else{
            $('#text').addClass('is-invalid');
            $('#text').focus();
            $('.thongbao').html('<span style="margin-top: -10px;color: red;font-style: oblique;font-size: 13px;margin-bottom: 10px;display: block;">Vui lòng nhập nội dung</span>')
        }
        
    })
    $('#OurFile').FancyFileUpload({
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#upload_vanban').find('input[name="_token"]').first().val(),
            atc     :   'upload_vanban_khieu_nai' 
        },
        maxfilesize: 3000000,
        edit:true
    });
    $('.form_add_thongso_vb input').keyup(function () { 
        if($(this).val()!==''){
            $(this).removeClass('is-invalid');
            $('.thongbao').html('');
        }
    });
    $('.ajax_edit_thongso_vb').click(function () { 
        var data_id = $(this).attr('data_id');
        $(".ajax_edit_thongso_vb").attr("readonly", true); 
        $(this).attr("readonly", false); 
        $('.btn-edit').hide();
        $('#btn-edit'+data_id).show();
    });
    $('.ajax_edit_thongso_vb').change(function () { 
        var data_id = $(this).attr('data_id');
        $.ajax({
                url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token  :   '{{csrf_token()}}',
                atc     :   'edit_chude_khieunai',
                id      :   data_id,
                text    :   $(this).val()
            },
            success : function (result){
                $('#list_thongso_vb_'+data_id).append(result);
                $('.thongbao'+data_id).html('');
                $('.btn-edit').hide();
                $.notify("Cập nhật thành công", "success");
            }
        });
    });
    $('.btn-edit').click(function(){
        $(this).hide();
    })
    $('.btn-del').click(function(){
        var data_id = $(this).attr('data_id');
        swal({
            title: "Xác nhận xóa chủ đề khiếu nại - tố cáo?",
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
                    atc     :   'del_chude_khieunai',
                    id      :   data_id
                },
                success : function (result){
                    $('#item_thongso_vb_'+data_id).remove();
                    swal("Xóa thành công", {
                        icon: "success",
                    });
                }
            });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
        
    })

    CKEDITOR.replace( 'noi_dung_khieu_nai', {
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