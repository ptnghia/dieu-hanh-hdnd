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
                        <h5 class="mb-0 text-primary">Thêm văn bản mới</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('van-ban.store')}}" id="upload_vanban">
                        @csrf
                        <input type="hidden" name="key_file" value="{{session('key_upload')}}">
                        <div class="col-12 col-lg-10 col-md-9">
                            <label for="inputTen" class="col-form-label">Tiêu đề Văn bản</label>
                            <input type="text" placeholder="Nhập tiêu đề văn bản"  name="ten" class="form-control @error('ten') is-invalid @enderror" value="{{old('ten')}}" id="inputTen">
                            @error('ten')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-md-3 col-12">
                            <label for="inputTen" class="col-form-label">Số hiệu - ký hiệu</label>
                            <input type="text" placeholder="Nhập số hiệu - ký hiệu"  name="so_hieu" class="form-control @error('so_hieu') is-invalid @enderror" value="{{old('so_hieu')}}" id="inputTen">
                            @error('so_hieu')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 form-select2 @error('loai_vanban_id') is-invalid @enderror">
                            <label for="loai_vanban_id" class="col-form-label">Loại văn bản</label>
                            <select name="loai_vanban_id" class=" form-control single-select" id="loai_vanban_id">
                                <option value="">Chọn loại văn bản</option>
                                @foreach ($loai_vb as $row)
                                <option value="{{$row->id}}">{{$row->ten}}</option>
                                @endforeach
                            </select>
                            @error('loai_vanban_id')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="linh_vuc_id" class="col-form-label">Lĩnh vực áp dụng</label>
                            <select name="linh_vuc_id" class=" form-control single-select" id="linh_vuc_id">
                                <option value="0">Chọn lĩnh vực</option>
                                @foreach ($linhvuc_vb as $row)
                                <option value="{{$row->id}}">{{$row->ten}}</option>
                                @endforeach
                            </select>
                            @error('linh_vuc_id')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 form-select2 @error('loai_vanban_id') is-invalid @enderror">
                            <label for="coquan_banhanh_id" class="col-form-label">Cơ quan ban hành</label>
                            <select name="coquan_banhanh_id" class=" form-control single-select" id="coquan_banhanh_id">
                                <option value="">Chọn cơ quan ban hành</option>
                                @foreach ($coquan_vb as $row)
                                <option value="{{$row->id}}">{{$row->ten}}</option>
                                @endforeach
                            </select>
                            @error('coquan_banhanh_id')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="hieu_luc" class="col-form-label">Thời gian văn bản có hiệu lực</label>
                            <input type="date"  name="hieu_luc" placeholder="" class="form-control @error('hieu_luc') is-invalid @enderror" value="{{old('hieu_luc')}}" id="hieu_luc">
                            @error('hieu_luc')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Giới thiệu văn bản</label>
                            <textarea name="mo_ta" id="mytextarea" rows="3" class="form-control @error('mo_ta') is-invalid @enderror">{{old('mo_ta')}}</textarea>
                            @error('mo_ta')
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
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @foreach ($thongso_vb as $key => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$item->id}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                    <i class="lni lni-cogs pe-3"></i> <b>{{$item->ten}}</b>
                                </button>
                            </h2>
                            <div id="collapse{{$item->id}}" class="accordion-collapse collapse  {{$key==0?'show':''}}" aria-labelledby="heading{{$item->id}}" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">	
                                    <ul class="list_thongso_vb" id="list_thongso_vb_{{$item->id}}">
                                        <li class="form_add_thongso_vb ">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Nội dung" id="text_{{$item->id}}">
                                                <button class="btn btn-outline-secondary add_thongso_vb" data_id="{{$item->id}}" type="button">Thêm mới</button>
                                            </div>
                                            <div class="thongbao thongbao{{$item->id}}"></div>
                                        </li>
                                        @if ($item->children)
                                        @foreach ($item->children as $child)
                                        <li class="item_thongso_vb" id="item_thongso_vb_{{$child->id}}">
                                            <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="{{$child->ten}}" data_id="{{$child->id}}" />
                                            <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="{{$child->id}}"><i class="bx bx-trash"></i></button>
                                            <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit{{$child->id}}" style="display: none" ><i class="bx bx-check"></i></button>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
    $('.add_thongso_vb').click(function(){
        var data_id = $(this).attr('data_id');
        var text = $('#text_'+data_id).val();
        if(text!==''){
            $('#text_'+data_id).val('');
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token  :   '{{csrf_token()}}',
                    atc     :   'add_thongso_vb',
                    id_loai :   data_id,
                    text    :   text
                },
                success : function (result){
                    $('#list_thongso_vb_'+data_id).append(result);
                    $('.thongbao'+data_id).html('');
                    swal("Đã thêm "+text+ " !", {
                        icon: "success",
                        timer: 2000
                    });
                    $('#text_'+data_id).removeClass('is-invalid');
                    $('#text_'+data_id).focus();
                    $('.thongbao'+data_id).html('');
                }
            });
        }else{
            $('#text_'+data_id).addClass('is-invalid');
            $('#text_'+data_id).focus();
            $('.thongbao'+data_id).html('<span style="margin-top: -10px;color: red;font-style: oblique;font-size: 13px;margin-bottom: 10px;display: block;">Vui lòng nhập nội dung</span>')
        }
        
    })
    $('#OurFile').FancyFileUpload({
        url:'{{route('ajax')}}',
        params: {
            _token  :   $('#upload_vanban').find('input[name="_token"]').first().val(),
            atc     :   'upload_vanban' 
        },
        maxfilesize: 3000000,
        edit:false
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
                atc     :   'edit_thongso_vb',
                id      :   data_id,
                text    :   $(this).val()
            },
            success : function (result){
                $('#list_thongso_vb_'+data_id).append(result);
                $('.thongbao'+data_id).html('');
                $('.btn-edit').hide();
            }
        });
    });
    $('.btn-edit').click(function(){
        $(this).hide();
    })
    $('.btn-del').click(function(){
        var data_id = $(this).attr('data_id');
        swal({
            title: "Xác nhận xóa?",
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
                    atc     :   'del_thongso_vb',
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

    CKEDITOR.replace( 'mo_ta', {
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