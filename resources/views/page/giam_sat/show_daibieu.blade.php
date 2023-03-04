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

    <h3 class=" size-18 my-4 ">{{$data_giamsat->ten}}</h3>
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
                            <h6 class="mb-0" style="text-transform: uppercase;">Nội dung giám sát</b></h6>
                        </div>
                    </div>
                    <hr>

                    <div>
                        {!!$data_giamsat->noi_dung!!}
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

                    <div class="accordion" id="accordionExample">
                        @foreach ($data_tv_giamsat as $key => $row)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading_{{$row->id}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$row->id}}" aria-expanded="{{$key==0?'true':''}}" aria-controls="collapseOne">
                                    {{$row->name}} 
                                </button>
                            </h2>
                            <div id="collapse_{{$row->id}}" class="accordion-collapse collapse {{$key==0?'show':''}}" aria-labelledby="heading_{{$row->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">	
                                    @foreach ($data_baocao as $files)
                                    @if($files->user_id == $row->user_id)
                                    <div class="d-flex item-file mb-3" id="item-file_{{$files->id}}">
                                        <div class="item_file_ext">{{$files->file_ext}}</div>
                                        <div class="item_file_name">
                                            <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{$files->ten =='' ? $files->file_name : $files->ten}}</div>
                                            <a data-fancybox data-type="pdf" href="{{asset($files->file_url)}}" target="_blank">Xem file</a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
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

@endsection