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
                        <h5 class="mb-0 text-primary">Nội dung khiếu nại - tố cáo</h5>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="text-center khieu_nai_item_left">
                            <img src="{{asset($data->hinh_anh1)}}" class="rounded-circle p-1 border" width="90" height="90" alt="{{$data->name1}}">
                            <h5 class=" size-14" style="white-space: nowrap;">{{$data->name1}}</h5>
                        </div>
                        <div class="flex-grow-1 ms-3 khieu_nai_item_right">
                            <h5 class="mt-0 size-16">{{$data->tieu_de}}</h5>
                            <div class="mb-3"><i class="bx bx-calendar"></i> {{date('d/m/Y', strtotime($data->ngay_khieu_nai))}}  - <i class="bx bx-purchase-tag"></i> {{$data->ten}}</div>
                            <div class="mb-3">
                                {!!$data->noi_dung_khieu_nai!!}
                            </div>
                            <hr>
                            @foreach ($file_vb as $file)
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
                    
                    <hr>
                    @if ($data->trang_thai==2)
                    <div class="mb-3"><img src="{{asset($data->hinh_anh2)}}" class="rounded-circle p-1 border" width="50" height="50" alt="{{$data->name2}}">  <b>{{$data->name2}}</b> đã trả lời  - <i class="bx bx-calendar"></i> {{date('d/m/Y', strtotime($data->ngay_tra_loi))}}</div>
                    <div class="mb-3">
                        {!!$data->noi_dung_tra_loi!!}
                    </div>
                    @else
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="{{route('khieu-nai.tra-loi.traloi', $data->id)}}" class="btn-icon py-1 btn btn-sm btn-success size-15"><i class="bx bx-detail"></i> Trả lời</a>
                        </div>
                        <div class=" d-flex justify-content-end">
                            <a href="{{route('khieu-nai.show', $data->id)}}" class="btn-icon py-1 btn btn-sm btn-info size-15"><i class="bx bx-detail"></i>Chi tiết</a>
                            @if (Auth::user()->id == $data->user_gui_id and $data->user_traloi_id ==0)
                            <form method="POST" action="" id="del_form_">
                                @csrf
                                {{ method_field('delete') }}
                                <button class="btn-icon py-1 btn btn-sm btn-danger px-1 mx-2 size-14 confirm_delete" data_id="" type="button" ><i class="bx bx-trash-alt"></i> Xóa Khiếu nại</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script>
    Fancybox.bind("[data-fancybox]", {});
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>
<script>

</script>
@endsection