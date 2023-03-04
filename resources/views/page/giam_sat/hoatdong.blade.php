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
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết hoạt động giám sát</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0" style="text-transform: uppercase;"><i class="bx bx-user"></i> <b>{{ Auth::user()->name}}</b></h6>
                        </div>
                    </div>
                    <hr>
                    @foreach ($hoatdonggiamsat as $item)
                    
                    @endforeach
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-group"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Tổ giám sát</span><br>
                                @if ($item->ten)
                                <b>{{$item->ten}}</b>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-user-pin"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Vai trò</span><br>
                                <b>
                                    @if ($item->vai_tro==0)
                                        Giám sát viên
                                    @elseif($item->vai_tro==1)
                                        Thư ký
                                    @elseif ($item->vai_tro==2)
                                        Tổ trưởng
                                    @else
                                        Trưởng đoàn giám sát
                                    @endif
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="lichtrinh">
                        @foreach ($hoatdonggiamsat as $row)
                        <!-- timeline item 1 -->
                        <div class="lichtrinh_item">
                            <div class="d-flex justify-content-between">
                                <div class="lichtrinh_item_time">
                                    {{date('d/m/Y', strtotime($row->ngay))}}<br>{{$row->gio}}
                                    
                                </div>
                                <div class="lichtrinh_item_content">
                                    <h4>{{$row->dia_diem}}</h4>
                                    <div class="noidung">
                                        {!!stripslashes($row->thanh_phan_tham_du)!!}
                                        <div>
                                            <button class="btn btn-warning me-2 btn-sm" id="add_sk" data-fancybox data-src="#add_sukien"><i class="bx bx-calendar-plus"></i> Thêm sự kiện</button>
                                            <div class="" id="add_sukien" style="display: none;width: 500px;max-width: 90%;">
                                                <h5 class="size-16">Thêm vào lịch sự kiện</h5>
                                                <hr>
                                                <div class="row mb-0">
                                                    <div class="mb-3 col-6">
                                                        <label for="ngay" class="form-label">Thời gian</label>
                                                        <input type="date" class="form-control" name="ngay" id="ngay_sk_{{$row->id}}" value="{{$row->ngay}}" placeholder="Ngày tham gia">
                                                    </div>
                                                    <div class="mb-3 col-6">
                                                        <label for="ngay" class="form-label">Báo trước (ngày)</label>
                                                        <input type="number" class="form-control" name="bao_truoc" id="bao_truoc_sk_{{$row->id}}" value="1" placeholder="Thời gian thông báo">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ngay" class="form-label">Tiêu đề</label>
                                                    <input type="text" class="form-control" name="tieu_de" id="tieu_de_sk_{{$row->id}}" value="{{$row->dia_diem}}" placeholder="Tiêu đề sự kiện">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ngay" class="form-label">Ghi chú cho sự kiện</label>
                                                    <textarea name="noi_dung" id="noi_dung_sk_{{$row->id}}" class="form-control" rows="2" placeholder="Nhập ghi chú cho sự kiện"></textarea>
                                                </div>
                                                <div class=" text-center">
                                                    <button class="btn btn-primary"  onclick="them_sukien({{$row->id}})">Thêm sự kiện</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Tài Liêu cho hoạt động giám sát</h6>
                        </div>
                    </div>
                    <hr>
                    @foreach ($files as $file)
                        <div class="d-flex item-file mb-3" id="item-file_{{$file->id}}">
                            <div class="item_file_ext">{{$file->file_ext}}</div>
                            <div class="item_file_name">
                                <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{$file->ten =='' ? $file->file_name : $file->ten}}</div>
                                <a data-fancybox data-type="pdf" href="{{asset($file->file_url)}}" target="_blank">Xem file</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0" style="text-transform: uppercase;">Chuẩn bị nội dung giám sát</b></h6>
                        </div>
                    </div>
                    <hr>
                    @foreach ($data_noidung_gs as $file)
                        @if ($file->type==1)
                        <div class="d-flex item-file mb-3" id="item-file_{{$file->id}}">
                            <div class="item_file_ext">{{$file->file_ext}}</div>
                            <div class="item_file_name">
                                <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{$file->ten =='' ? $file->file_name : $file->ten}}</div>
                                <a data-fancybox data-type="pdf" href="{{asset($file->file_url)}}" target="_blank">Xem file</a>
                            </div>
                        </div>                            
                        @endif
                    @endforeach

                    <div class="row g-3" id="upload_vanban">
                        <div class="col-12">
                            <label class="col-form-label">Bấm chọn hoặc kéo thả file văn bản vào ô bên dưới</label>
                            <input id="OurFile" type="file" name="OurFile" accept="application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"  multiple>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0" style="text-transform: uppercase;">Báo cáo kết quả giám sát</b></h6>
                        </div>
                    </div>
                    <hr>
                    @foreach ($data_noidung_gs as $file)
                        @if ($file->type==2)
                        <div class="d-flex item-file mb-3" id="item-file_{{$file->id}}">
                            <div class="item_file_ext">{{$file->file_ext}}</div>
                            <div class="item_file_name">
                                <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{$file->ten =='' ? $file->file_name : $file->ten}}</div>
                                <a data-fancybox data-type="pdf" href="{{asset($file->file_url)}}" >Xem file</a>
                            </div>
                        </div>                            
                        @endif
                    @endforeach
                    <div class="row g-3" id="upload_vanban">
                        <div class="col-12">
                            <label class="col-form-label">Bấm chọn hoặc kéo thả file văn bản vào ô bên dưới</label>
                            <input id="OurFile2" type="file" name="OurFile2" accept="application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"  multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
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
<link href="{{asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script>
$('#OurFile').FancyFileUpload({
    url:'{{route('ajax')}}',
    params: {
        _token  :   '{{csrf_token()}}',
        atc     :   'upload_vanban_hoatdong', 
        type    :   1,
        giam_sat_id :   '{{$id_giamsat}}',
    },
    maxfilesize: 3000000,
    edit:true
});
$('#OurFile2').FancyFileUpload({
    url:'{{route('ajax')}}',
    params: {
        _token  :   '{{csrf_token()}}',
        atc     :   'upload_vanban_hoatdong2', 
        type    :   2,
        giam_sat_id :   '{{$id_giamsat}}',
    },
    maxfilesize: 3000000,
    edit:true
});
function them_sukien(id){
    var ngay = $('#ngay_sk_'+id).val();
    var bao_truoc = $('#bao_truoc_sk_'+id).val();
    var tieu_de = $('#tieu_de_sk_'+id).val();
    var noi_dung = $('#noi_dung_sk_'+id).val();

    if(ngay!=='' && tieu_de!==''){
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token      :   '{{csrf_token()}}',
                atc         :   'add_sukien_giamsat',
                ngay        :   ngay,
                bao_truoc   :   bao_truoc,
                tieu_de     :   tieu_de,
                noi_dung    :   noi_dung,
                link        :   '{{ url()->full() }}',
                id_lichtrinh:   id
            },
            success : function (){
                Fancybox.close();
                swal("Đã thêm vào lịch sự kiện", "", "success", {button: false,timer: 2000 });
            }
        });
    }
}

</script>
@endsection