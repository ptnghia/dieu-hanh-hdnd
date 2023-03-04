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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách thư mời</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row g-3">
        @foreach ($datas as $item)
        <div class="col-md-6 col-12">
            <div class="card radius-10">
                <div class="card-body">
                    <h5 class="card-title size-16 mb-3"><i class="bx bx-star"></i> {{$item->ten	}}</h5>
                    <p class="card-text mb-3">{{$item->ly_do	}}</p>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-calendar"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Thời gian tổ chức</span><br>
                                <b>{{date('d/m/Y',strtotime($item->thoi_gian))}}</b>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-selection"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Hình thức tổ chức</span><br>
                                <b>
                                    @if ($item->hinh_thuc == '0')
                                        Họp trực tiếp và hợp trực tuyến
                                    @elseif ($item->hinh_thuc == '1')
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
                                <b>{{$item->dia_diem}}</b>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-bookmarks"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Cơ quan tổ chức</span><br>
                                <b>{{$item->co_quan}}</b>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="align-items-center text-center gap-2">
                        
                        <a href="{{route('ky-hop.show',$item->id)}}" class="btn btn-info btn-sm"><i class="bx bx-show-alt"></i> Xen chi tiết</a>
                        <a href="javascript:;" class="btn btn-warning btn-sm"><i class="bx bx-envelope"></i> Xem thư mời</a>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex justify-content-between"> 
                    <small class="text-muted">Thời gian nhận: {{date('d/m/Y',strtotime($item->ngaynhan))}}</small>
                    <small class="text-muted">Người gửi: {{$item->name}}</small>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
    

    {{ $datas->links() }}
</div>

@endsection

@section('js')

<script>
    
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>
@endsection