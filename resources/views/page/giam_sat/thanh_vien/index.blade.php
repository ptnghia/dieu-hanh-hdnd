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
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Thành viên đoàn giám sát</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('giam-sat.show',$id_giamsat)}}" class="btn btn-info btn-sm size-14"><i class="bx bx-show-alt"></i> Thông tin hoạt động giám sát</a>
            <a href="{{route('giam-sat.lich-trinh.index', $id_giamsat)}}" class="btn btn-warning btn-sm size-14"><i class="bx bx-calendar-edit"></i> lịch giám sát</a>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-7 ">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Danh sách thành viên</h6>
                        </div>
                        @if(count($data_tv_giamsat)>0)
                        <div class="ms-auto">
                            <a class=" btn-sm btn btn-primary" data-fancybox data-src="#add_thongbao">
                                <i class="bx bx-bell"></i> Gửi thông báo
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class=" table-responsive">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>Họ tên tên</th>
                                    <th>Chức vụ</th>
                                    <th>Tổ công tác</th>
                                    <th>Vai trò</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_thanhvien_chon">
                                @foreach ($data_tv_giamsat as $row)
                                <tr id="tr_thanhvien_{{$row->id}}">
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->chuc_vu}}</td>
                                    <td>
                                        <select class="form-select" onchange="update_tv_giamsat($(this), {{$row->id}}, 'giam_sat_nhom_id')">
                                            <option value="0">Chọn tổ công tác</option>
                                            @foreach ($data_nhom as $value)
                                            <option {{$row->giam_sat_nhom_id == $value->id ?'selected':'' }} value="{{$value->id}}">{{$value->ten}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" onchange="update_tv_giamsat($(this), {{$row->id}}, 'vai_tro')">
                                            <option>Thành viên đoàn</option>
                                            <option {{$row->vai_tro == 1 ?'selected':'' }} value="1">Thư ký</option>
                                            <option {{$row->vai_tro == 2 ?'selected':'' }} value="2">Tổ trưởng</option>
                                            <option {{$row->vai_tro == 3 ?'selected':'' }} value="3">Trưởng đoàn</option>
                                        </select>
                                    </td>
                                    <td class="text-center"><button class="btn-icon mx-1 btn btn-sm btn-danger px-2 size-14" onclick="del_tv_giamsat({{$row->id}})"><i class="bx bx-trash-alt"></i> Xóa </button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center" id="thongbaogui">
                        @if ($data_giamsat->tb_thanhvien == 0)
                        <span class=" text-danger"><i class="bx bx-comment-x"></i> Chưa gửi thông báo cho thành viên đoàn giám sát </span>
                        @else
                        <span class=" text-success"><i class="bx bx-message-check"></i> Đã gửi  thông báo cho thành viên đoàn giám sát </span>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 ">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Tổ thành viên</h6>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal"><i class="bx bx-plus"></i>Thêm mới</button>
                        </div>
                    </div>
                    <hr>

                    <div>
                        @foreach ($data_nhom as $row)
                        <div class="item_to_giamsat">
                            <div class="item_to_giamsat_title">{{$row->ten}}</div>
                            <div class="item_to_giamsat_content">{{$row->nhiem_vu}}</div>
                            <div class="tool">
                                <button data-bs-toggle="modal" data-bs-target="#Modaledit_{{$row->id}}" class="btn-icon mx-1 btn btn-sm btn-warning px-2 size-14"><i class="bx bx-edit-alt"></i></button>
                                <button class="btn-icon mx-1 btn btn-sm btn-danger px-2 size-14" onclick="del_nhom({{$row->id}})"><i class="bx bx-trash-alt"></i></button>
                            </div>
                            
                        </div>
                        <div class="modal fade" id="Modaledit_{{$row->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="ten_to" class="col-form-label">Tên tổ</label>
                                            <input type="text" class="form-control" name="ten" id="ten_to_{{$row->id}}" value="{{$row->ten}}" placeholder="Nhập tên tổ">
                                        </div>
                                        <div class="mb-2">
                                            <label for="nhiem_vu_to" class="col-form-label">Nhiệm vụ</label>
                                            <textarea name="nhiem_vu" id="nhiem_vu_to_{{$row->id}}" placeholder="Nhập nhiệm vụ chi tiết cho tổ giám sát" class=" form-control" rows="3">{{$row->nhiem_vu}}</textarea>
                                        </div>
                                        <div id="thongbao_add_{{$row->id}}"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" onclick="update_togiamsat({{$row->id}})">Cập nhật tổ giám sát</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Thêm thành viên đoàn giám sát</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <input type="text" placeholder="Nhập tên thành viên" id="search_name" class="form-control" />
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Chức vụ</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody id="list_thanhvien_seach">
                            <tr>
                                <td colspan="3" class="text-center"><i>Chưa có dữ liệu...</i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="" id="add_thongbao" style="display: none;width: 500px;max-width: 90%;">
    <h5 class="size-16">Gửi thông báo cho đoàn giám sát</h5>
    <hr>
    <div class="mb-3">
        <label for="ngay" class="form-label">Tiêu đề thông báo</label>
        <input type="text" class="form-control" name="tieu_de" id="tieu_de_tb" value="Tham gia đoàn giám sát" placeholder="Tiêu đề thông báo">
    </div>
    <div class="mb-3">
        <label for="ngay" class="form-label">Nội dung thông báo</label>
        <textarea name="noi_dung" id="noi_dung_tb" class="form-control" rows="3" placeholder="Nội dung thông báo">Phân công tham gia hoạt động giám sát: {{$data_giamsat->ten}}</textarea>
    </div>
    <div class=" text-center">
        <button class="btn btn-primary"  onclick="add_thongbao_giamsat()">Gửi thông báo</button>
    </div>
</div>

<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tổ thành viên giám sát</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="ten_to" class="col-form-label">Tên tổ</label>
                    <input type="text" class="form-control" name="ten" id="ten_to" placeholder="Nhập tên tổ">
                </div>
                <div class="mb-2">
                    <label for="nhiem_vu_to" class="col-form-label">Nhiệm vụ</label>
                    <textarea name="nhiem_vu" id="nhiem_vu_to" placeholder="Nhập nhiệm vụ chi tiết cho tổ giám sát" class=" form-control" rows="3"></textarea>
                </div>
                <div id="thongbao_add"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="location.reload(true);">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="add_togiamsat({{$id_giamsat}})">Cập nhật tổ giám sát</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script>
    Fancybox.bind("[data-fancybox]", {});
    $(document).ready(function() {
        $('#datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/vi.json"
            }
        });
    });

</script>

<script>
    function add_thongbao_giamsat(){

        var tieu_de = $('#tieu_de_tb').val();
        var noi_dung = $('#noi_dung_tb').val();

        if(tieu_de !== ''){
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token      :   '{{csrf_token()}}',
                    atc         :   'add_thongbao_giamsat',
                    loai        :   4,
                    tieu_de     :   tieu_de,
                    noi_dung    :   noi_dung,
                    link        :   '{{route('giam-sat.show', $data_giamsat->id)}}',
                    id_giamsat  :   '{{$data_giamsat->id}}',
                },
                success : function (data){
                    //swal(data, "", "success", {button: false});
                    Fancybox.close();
                    swal("Đã gửi thông báo cho tất cả thành viên đoàn giám sát", "", "success", {button: false,timer: 2000 });
                    $('#thongbaogui').html('<span class=" text-success"><i class="bx bx-message-check"></i> Đã gửi  thông báo cho thành viên đoàn giám sát </span>');
                }
            });
        }
    }
    function del_tv_giamsat(id){
        swal({
            title: "Xác nhận xóa thành viên tổ giám sát?",
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
                        _token          :    '{{csrf_token()}}',
                        id              :   id,
                        atc             :   'del_tv_togiamsat',
                    },
                    success : function (){
                        $('#tr_thanhvien_'+id).remove();
                    }
                });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }
    function update_tv_giamsat(_this, id,col){
        var text = _this.val();
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token          :    '{{csrf_token()}}',
                col             :   col,
                id              :   id,
                text            :   text,
                atc             :   'update_thanhvien_giamsat',
            },
            success : function (data){
                $.notify("Cập nhật thành công", "success");
            }
        });
    }
    function chon_thanhvien(id_tv){
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token          :    '{{csrf_token()}}',
                giam_sat_id     :   {{$id_giamsat}},
                user_id         :   id_tv,
                atc             :   'add_thanhvien_giamsat',
            },
            success : function (data){
               $('#list_thanhvien_chon').append(data);
            }
        });
    }
    $('#search_name').keyup(function () { 
        var name = $(this).val();
        if(name!==''){
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token          :    '{{csrf_token()}}',
                    ten             :   name,
                    giam_sat_id     :   {{$id_giamsat}},
                    atc             :   'search_thanhvien_giamsat',
                },
                success : function (data){
                    $('#list_thanhvien_seach').html(data);
                }
            });
        }else{
            $('#list_thanhvien_seach').html('<tr><td colspan="3" class="text-center"><i>Chưa có dữ liệu...</i></td></tr>')
        }
    });
    function del_nhom(id){
        swal({
            title: "Xác nhận xóa tổ giám sát?",
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
                        _token          :    '{{csrf_token()}}',
                        id              :   id,
                        atc             :   'del_togiamsat',
                    },
                    success : function (){
                        location.reload(true);
                    }
                });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
    }
    function update_togiamsat(id){
        var ten     = $('#ten_to_'+id).val();
        var nhiemvu = $('#nhiem_vu_to_'+id).val();
        if(ten!==''){
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token          :    '{{csrf_token()}}',
                    id              :   id,
                    ten             :   ten,
                    nhiem_vu        :   nhiemvu,
                    atc             :   'update_togiamsat',
                },
                success : function (){
                    location.reload(true);
                }
            });
        }else{
            $('#thongbao_add_'+id).html('<span style="color: red;font-style: italic;"><i class="bx bx-error"></i> </i>Vui lòng nhập tên tổ giám sát!</span>');
        }
    }
    function add_togiamsat(id){
        var ten     = $('#ten_to').val();
        var nhiemvu = $('#nhiem_vu_to').val();
        if(ten!==''){
            $.ajax({
                url : "{{route('ajax')}}",
                type : "post",
                dataType:"text",
                data : {
                    _token          :    '{{csrf_token()}}',
                    giam_sat_id     :   id,
                    ten             :   ten,
                    nhiem_vu        :   nhiemvu,
                    atc             :   'add_togiamsat',
                },
                success : function (){
                    $('#ten_to').val('');
                    $('#nhiem_vu_to').val('')
                    $('#thongbao_add').html('<span style="color: #15ca20;font-style: italic;"><i class="bx bx-check-circle"></i> Đã thêm tổ giám sát</span>');
                }
            });
        }else{
            $('#thongbao_add').html('<span style="color: red;font-style: italic;"><i class="bx bx-error"></i> </i>Vui lòng nhập tên tổ giám sát!</span>');
        }
    }
    $('.check_ajax').click(function(){
        if($(this).prop('checked')){
            var value = 1;
        }else{
            value = 0;
        }
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token :    '{{csrf_token()}}',
                id     :    $(this).attr('data_id'),
                col    :    $(this).attr('data_col'),
                table  :    $(this).attr('data_table'),
                atc    :    'check_id',
                value  :    value
            },
            success : function (){
                $.notify("Cập nhật thành công", "success");
            }
        });
    })
</script>
@endsection