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
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết kỳ họp</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-7 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary size-16">{{$dataId->ten}}</h5>
                    </div>
                    <hr>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-calendar"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Thời gian tổ chức</span><br>
                                <b>{{date('d/m/Y',strtotime($dataId->thoi_gian))}}</b>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-selection"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Hình thức tổ chức</span><br>
                                <b>
                                    @if ($dataId->hinh_thuc == '0')
                                        Họp trực tiếp và hợp trực tuyến
                                    @elseif ($dataId->hinh_thuc == '1')
                                        Họp trực tiếp
                                    @else
                                        Họp trực tuyến
                                    @endif
                                </b>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-map"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Địa điểm tổ chức</span><br>
                                <b>{{$dataId->dia_diem}}</b>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-bookmarks"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Cơ quan tổ chức</span><br>
                                <b>{{$dataId->co_quan}}</b>
                            </div>
                        </div>
                    </div>
                    <p class="mb-3"><b>Lý do họp: </b> {{$dataId->ly_do}}</p>
                    <h5 class=" size-6">Nội dung họp: </h5>
                    <div>
                        {!!stripslashes ($dataId->noi_dung_hop) !!}
                    </div>
                    <hr>
                    @if($data_thumoi)
                    <div class=" d-flex justify-content-end">
                        <button data-fancybox data-src="#thumoi" class="btn btn-info"><i class="bx bx-envelope"></i> Xem thư mời họp</button>
                    </div>
                    <div class="box-thumoi py-5 px-5" id="thumoi" style="display: none;width: 970px;max-width: 100%;">
                        <table style="width: 100%;text-align: center;color: #000;">
                            <tr>
                                <td style="float: left;">
                                    <b style="font-size: 15px;">ỦY BAN NHÂN DÂN <br> TỈNH BÌNH THUẬN</b><br>
                                    Số: {{$data_thumoi->so}}
                                </td>
                                <td style="float: right;">
                                    <b style="font-size: 15px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br> Độc Lập Tự Do Hạnh Phúc</b><br>
                                    <i>{{$data_thumoi->dia_diem}}, ngày {{date('d',strtotime($data_thumoi->thoi_gian))}} tháng {{date('m',strtotime($data_thumoi->thoi_gian))}} năm {{date('Y',strtotime($data_thumoi->thoi_gian))}} </i>
                                </td>
                            </tr>
                        </table>
                        <h3 class="text-center" style="margin-top: 40px;margin-bottom: 20px;">GIẤY MỜI</h3>
                        <p class="text-center">Kính gửi: {{Auth::user()->name}}</p>
                        <br>
                        <div>
                            {!!stripslashes($data_thumoi->noi_dung)!!}
                        </div>
                        <table  style="width: 100%; margin-top: 35px;">
                            <tr>
                                <td style="vertical-align: top;">
                                    <i><b>Nơi nhận:</b><br>
                                    {!! nl2br($data_thumoi->noi_nhan) !!}
                                    </i>
                                </td>
                                <td class="text-center">
                                    <div style="float: right;background-image: url('{{asset($data_thumoi->con_dau)}}');background-size: 180px;background-repeat: no-repeat;background-position: center 60px;">
                                        <b style="margin-bottom: 120px;display: block;">{!!str_replace('-','<br>',$data_thumoi->co_quan_ky)!!}</b>

                                        <div class="text-center"><b>{{$data_thumoi->nguoi_ky}}</b></div>
                                    </div>
                                    
                                </td>
                            </tr>
                        </table>

                    </div>
                    @else
                    <div class=" d-flex justify-content-end">
                        <a href="{{route('thu-moi.index', $dataId->id)}}"  class="btn btn-info"><i class="bx bx-envelope"></i> Tạo thư mời</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center position-relative">
                        <div>
                            <i class="bx bx-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary size-16">Danh sách đại biểu</h5>
                    </div>
                    <hr>
                    <div class=" table-responsive table-daibieu">
                        <table class=" table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_daibieu as $row)
                                <tr id="tv_{{$row->id_moi}}">
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->dien_thoai}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        @if($row->trang_thai_moi == 1 )
                                        <span class="btn-icon btn btn-sm btn-success"><i class="bx bx-check"></i>Tham gia</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="bx bx-file me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary size-16">Văn bản - tài liệu cho kỳ họp</h5>
                    </div>
                    <hr>
                    @foreach ($files as $file)
                        <div class="d-flex item-file mb-3" id="item-file_{{$file->id}}">
                            <div class="item_file_ext">{{$file->file_ext}}</div>
                            <div class="item_file_name">
                                <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{$file->ten =='' ? $file->file_name : $file->ten}}</div>
                                <a data-fancybox data-type="pdf" href="{{asset($file->file_url)}}">Xem file</a>
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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    Fancybox.bind("[data-fancybox]", {});
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/vi.json"
            }
        });
    });
</script>
@endsection