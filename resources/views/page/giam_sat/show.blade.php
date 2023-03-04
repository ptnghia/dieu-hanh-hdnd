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
                            <h6 class="mb-0">Lịch trình giám sát</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="lichtrinh">
                        @foreach ($data_lichtrinh as $row)
                        <!-- timeline item 1 -->
                        <div class="lichtrinh_item">
                            <div class="d-flex justify-content-between">
                                <div class="lichtrinh_item_time"> {{date('d/m/Y', strtotime($row->ngay))}}<br>{{$row->gio}}
                                </div>
                                <div class="lichtrinh_item_content">
                                    <h4>{{$row->dia_diem}}</h4>
                                    <div class="noidung">
                                        {!!stripslashes($row->thanh_phan_tham_du)!!}
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
                            <h6 class="mb-0">Tổ thành viên</h6>
                        </div>
                    </div>
                    <hr>

                    <div>
                        @foreach ($data_nhom as $row)
                        <div class="item_to_giamsat">
                            <div class="item_to_giamsat_title">{{$row->ten}}</div>
                            <div class="item_to_giamsat_content">{{$row->nhiem_vu}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Danh sách thành viên</h6>
                        </div>
                    </div>
                    <div class=" table-responsive table-daibieu">
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>Họ tên tên</th>
                                    <th>Chức vụ</th>
                                    <th>Tổ công tác</th>
                                    <th>Vai trò</th>
                                </tr>
                            </thead>
                            <tbody id="list_thanhvien_chon">
                                @foreach ($data_tv_giamsat as $row)
                                <tr id="tr_thanhvien_{{$row->id}}">
                                    <td style="white-space: nowrap;">{{$row->name}}</td>
                                    <td>{{$row->chuc_vu}}</td>
                                    <td>
                                        @foreach ($data_nhom as $value)
                                            @if ($row->giam_sat_nhom_id == $value->id)
                                            {{$value->ten}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($row->vai_tro==0)
                                            Giám sát viên
                                        @elseif($row->vai_tro==1)
                                            Thư ký
                                        @elseif ($row->vai_tro==2)
                                            Tổ trưởng
                                        @else
                                            Trưởng đoàn giám sát
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                            <h6 class="mb-0" style="text-transform: uppercase;">Báo cáo kết quả giám sát</b></h6>
                        </div>
                    </div>
                    <hr>
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

<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'thanh_phan_tham_du', {
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