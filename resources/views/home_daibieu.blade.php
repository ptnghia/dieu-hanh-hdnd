@extends('layouts.main')

@section('title')
Trang chủ
@endsection
@section('css_file')
<link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
@endsection
@section('css')
<style>
</style>    
@endsection

@section('content')
<div class="page-content">
    
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Sự kiện sắp diễn ra</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="lichtrinh">
                        @foreach ($list_sukien as $item)
                        <div class="lichtrinh_item">
                            <div class="d-flex">
                                <div class="lichtrinh_item_time"> {{date('d/m/Y',strtotime($item->ngay))}}
                                </div>
                                <div class="lichtrinh_item_content">
                                    <h4>{{$item->tieu_de}}</h4>
                                    <div class="noidung" style="padding-bottom: 20px;">
                                        <div class="mb-2">{!!$item->noi_dung!!}</div>
                                        <a href="{{$item->link}}" ><i class="bx bx-chevrons-right"></i> Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0"><i class="bx bx-bell" style="font-size: 20px;position: relative;top: 4px;margin-right: 7px;"></i>Thông báo mới</h6>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="list_thongbao ps table-daibieu">
                        <table class="table" id="datatable">
                            <thead style="display: none">
                                <tr>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            @foreach ($list_thongbao_new as $item)
                            <tr>
                                <td>
                                    <span style="display: none">{{$item->ngay_gui}}</span>
                                    @if($item->loai==0)
                                    <span class="icon-thongbao"><i class="bx bx-brightness"></i></span>
                                    @elseif ($item->loai==1)
                                    <span class="icon-thongbao"><i class="bx bx bx-group"></i></span>
                                    @elseif ($item->loai==2)
                                    <span class="icon-thongbao"><i class="bx bx-shield"></i></span>
                                    @elseif ($item->loai==3)
                                    <span class="icon-thongbao"><i class="bx bx-atom"></i></span>
                                    @else
                                    <span class="icon-thongbao"><i class="bx bx-notification"></i></span>
                                    @endif
                                </td>
                                <td>
                                    <a class="item-thongbao " href="{{$item->link}}">
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">{{$item->tieu_de}}<span class="msg-time float-end">{{date('d/m/Y',strtotime($item->ngay_gui))}}</span>
                                            </h6>
                                            <p class="msg-info">{{$item->noi_dung}}</p>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <!--<div class="row">
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Khiếu nại - tố cáo đang quan tâm</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Ý kiến cử tri đang quan tâm</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Hoạt động giám sát</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7 col-xl-8 border-end">
                            
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--end row-->
</div>
@endsection
@section('js')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/vi.json"
            },
            "bFilter": false,
            "bInfo" : false,
            "lengthChange": false,
            "ordering": false,
        });
    });
</script>    
@endsection