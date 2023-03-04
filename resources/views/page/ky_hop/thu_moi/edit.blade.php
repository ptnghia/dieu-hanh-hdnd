@extends('layouts.main')

@section('css_file')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
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
                    <li class="breadcrumb-item active" aria-current="page">Thư mời họp</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-7 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center position-relative">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Thông tin chi tiết</h5>
                        <button class="btn btn-warning btn-sm position-absolute end-0 btn-edit" onclick="$('#upload_vanban, .btn-xem').show(); $('.box-thumoi, .btn-edit').hide() "><i class="bx bx-message-square-edit"></i> Sửa thư mời</button>
                        <button class="btn btn-warning btn-sm position-absolute end-0 btn-xem" style="display: none"  onclick="$('#upload_vanban, .btn-xem').hide(); $('.box-thumoi, .btn-edit').show() "><i class="bx bx-message-detail"></i> Xem thư mời</button>
                    </div>
                    <hr>
                    <div class="box-thumoi px-3">
                        <table style="width: 100%;text-align: center;color: #000;">
                            <tr>
                                <td style="float: left;">
                                    <b style="font-size: 15px;">ỦY BAN NHÂN DÂN <br> TỈNH BÌNH THUẬN</b><br>
                                    Số: {{$data->so}}
                                </td>
                                <td style="float: right;">
                                    <b style="font-size: 15px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> Độc Lập Tự Do Hạnh Phúc</b><br>
                                    <i>{{$data->dia_diem}}, ngày {{date('d',strtotime($data->thoi_gian))}} tháng {{date('m',strtotime($data->thoi_gian))}} năm {{date('Y',strtotime($data->thoi_gian))}} </i>
                                </td>
                            </tr>
                        </table>
                        <h3 class="text-center" style="margin-top: 40px;margin-bottom: 20px;">GIẤY MỜI</h3>
                        <p class="text-center">Kính gửi: ....................................</p>
                        <br>
                        <div>
                            {!!$data->noi_dung!!}
                        </div>
                        <table  style="width: 100%; margin-top: 35px;">
                            <tr>
                                <td style="vertical-align: top;">
                                    <i><b>Nơi nhận:</b><br>
                                    {!! nl2br($data->noi_nhan) !!}
                                    </i>
                                </td>
                                <td class="text-center">
                                    <div style="float: right;background-image: url('{{asset($data->con_dau)}}');background-size: 180px;background-repeat: no-repeat;background-position: center 60px;">
                                        <b style="margin-bottom: 120px;display: block;">{!!str_replace('-','<br>',$data->co_quan_ky)!!}</b>

                                        <div class="text-center"><b>{{$data->nguoi_ky}}</b></div>
                                    </div>
                                    
                                </td>
                            </tr>
                        </table>

                    </div>
                    <form class="row g-3" style="display: none" method="POST" action="{{ route('thu-moi.thanhvien',$id)}}" id="upload_vanban" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
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
                            <input type="text" placeholder="Nhập số hiệu thư mời"  name="so" class="form-control @error('so') is-invalid @enderror" value="{{old('so') ?? $data->so}}" id="so">
                            @error('so')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <label for="dia_diem" class="col-form-label">Địa điểm</label>
                            <input type="text" placeholder="Nhập địa điểm"  name="dia_diem" class="form-control @error('dia_diem') is-invalid @enderror" value="{{old('dia_diem')  ?? $data->dia_diem }}" id="dia_diem">
                            @error('dia_diem')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <label for="thoi_gian" class="col-form-label">Thời gian</label>
                            <input type="date" placeholder="Nhập thời gian"  name="thoi_gian" class="form-control @error('thoi_gian') is-invalid @enderror" value="{{old('thoi_gian') ?? $data->thoi_gian}}" id="thoi_gian">
                            @error('thoi_gian')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="co_quan_ky" class="col-form-label">Cơ quan - chức vụ ký tên</label>
                            <input type="text" placeholder="Nhập Cơ quan - chức vụ ký tên" name="co_quan_ky" class="form-control @error('co_quan_ky') is-invalid @enderror" value="{{old('co_quan_ky') ?? $data->co_quan_ky}}" id="co_quan_ky">
                            @error('co_quan_ky')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="nguoi_ky" class="col-form-label">Họ tên người ký thư mời</label>
                            <input type="text"  name="nguoi_ky" placeholder="" class="form-control @error('nguoi_ky') is-invalid @enderror" value="{{old('nguoi_ky')  ?? $data->nguoi_ky}}" id="nguoi_ky">
                            @error('nguoi_ky')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="noi_nhan" class="col-form-label">Nơi nhận</label>
                            <textarea name="noi_nhan" id="noi_nhan" rows="3" class="form-control @error('noi_nhan') is-invalid @enderror">{{old('noi_nhan') ?? $data->noi_nhan}}</textarea>
                            @error('noi_nhan')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Nội dung thư mời</label>
                            <textarea name="noi_dung" rows="3" class="form-control @error('noi_dung') is-invalid @enderror">{{old('noi_dung')  ?? $data->noi_dung}}</textarea>
                            @error('noi_dung')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">File hình con dấu và chữ ký</label>
                            <input type="file" name="file" class=" form-control  @error('file') is-invalid @enderror" accept="image/png, image/jpeg">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <a href="{{route('van-ban.index')}}" class="btn btn-default px-3 btn-load"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Cập nhật thư mời</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-12">

            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center position-relative">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Danh sách đại biểu</h5>
                    </div>
                    <hr>
                    <table class=" table" id="example">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_daibieu as $row)
                            <tr id="tv_{{$row->id_moi}}">
                                <td>{{$row->name}}</td>
                                <td>{{$row->dien_thoai}}</td>
                                <td>{{$row->email}}</td>
                                <td class="text-center">
                                    <button class="btn-icon btn btn-sm btn-danger px-1 mx-2 size-14" onclick="xoa_thanhvien_hop({{$row->id_moi}},'{{$row->name}}')"><i class="bx bx-trash-alt"></i> Xóa</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center position-relative">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Gửi thư mời cho đại biểu</h5>
                    </div>
                    <hr>

                    <div class="mb-3 position-relative">
                        <button class="btn btn-primary btn-sm" onclick="ajax_nhom()" style="position: absolute;padding: 3px 12px 5px;right: 0;font-size: 14px;">Chọn</button>
                        <label class="col-form-label">Nhóm thành viên </label>
                        <select multiple class="form-control multiple-select" placeholder="Chọn nhóm thành viên" name="nhom[]" id="nhomthanhvien">
                            @foreach ($data_nhom_tv as $row)
                            <option value="{{$row->id}}">{{$row->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--<div-- class="mb-3">
                        <label class="col-form-label">Tìm theo họ thành viên</label>
                        <input type="text" placeholder="Nhập họ tên thành viên" id="ten_tv" class="form-control" />
                    </div-->
                    <hr>  
                    <form method="POST" action="{{route('thu-moi.thanhvien',$id)}}" >
                        @csrf
                        <div id="list_thanhvien_add" class="row"></div>  
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" style="display: none" id="add_tv"><i class="bx bx-send"></i> Gửi thư mời cho đại biểu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>
<script>
    function xoa_thanhvien_hop(id, ten){
        swal({
            title: "Thu hồi giấy mời?",
            text: "Xác nhận thu hồi giấy mời của đại biểu "+ten,
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
                        _token      :   '{{csrf_token()}}',
                        atc         :   'xoa_thumoi_hop',
                        id          :   id      
                    },
                    success : function (){
                        $('#tv_'+id).remove();
                    }
                });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/vi.json"
            }
        });
    });
    function ajax_nhom(){
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token      :   '{{csrf_token()}}',
                atc         :   'get_thanhvien_group',
                list_id     :    $('#nhomthanhvien').val()
            },
            success : function (result){
                $('#list_thanhvien_add').html(result);
                if(result!==''){
                    $('#add_tv').show();
                }else{
                    $('#add_tv').hide();
                }
            }
        });
    }
    
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