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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách ý kiến cử tri</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('y-kien-cu-tri.create')}}" class="btn btn-primary size-14"><i class="lni lni-circle-plus"></i> Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="row g-3">
        @foreach ($datas_new as $item)
        <div class="col-lg-12 col-12">
            <div class="card radius-10">
                <div class="card-body khieu_nai_item">
                    <div class="d-flex align-items-center">
                        <div class="text-center khieu_nai_item_left">
                            <img src="{{asset($item->hinh_anh)}}" class="rounded-circle p-1 border" width="90" height="90" alt="{{$item->name}}">
                            <h5 class=" size-14" style="white-space: nowrap;">{{$item->name}}</h5>
                        </div>
                        
                        <div class="flex-grow-1 ms-3 khieu_nai_item_right">
                            <h5 class="mt-0 size-16">{{$item->tieu_de}}</h5>
                            <div class="mb-3"><i class="bx bx-calendar"></i> {{date('d/m/Y', strtotime($item->ngay_y_kien))}}  - <i class="bx bx-purchase-tag"></i> {{$item->ten}}</div>
                            <div class="mb-3" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">
                                {!!$item->noi_dung_y_kien!!}
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    @if (Auth::user()->permissions_id > 1)

                                        @if ($item->noi_dung_tra_loi=='')
                                        <a href="{{route('y-kien-cu-tri.tra-loi.traloi', $item->id)}}" class="btn-icon py-1 btn btn-sm btn-success size-15"><i class="bx bx-detail"></i> Trả lời</a>
                                        @else
                                        <a href="{{route('y-kien-cu-tri.tra-loi.traloi', $item->id)}}" class="ms-2 btn-icon py-1 btn btn-sm btn-warning px-2 size-14"><i class="bx bx-edit-alt"></i>Sửa nội dung trả lời</a>
                                        @endif
                                    @else
                                        @if  ($item->noi_dung_tra_loi != '')  
                                        <span class="ms-2 btn-icon py-1 btn btn-sm btn-success px-2 size-14"><i class="bx bx-check-double"></i> Đã trả lời</span>
                                        @else
                                        <span class="ms-2 btn-icon py-1 btn btn-sm btn-warning px-2 size-14"><i class="bx bx-message-x"></i> Chưa trả lời</span>
                                        @endif
                                        
                                    @endif
                                    
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <a href="{{route('y-kien-cu-tri.show', $item->id)}}" class="btn-icon py-1 btn btn-sm btn-info size-15 mx-2"><i class="bx bx-detail"></i> xem chi tiết</a>
                                    @if (Auth::user()->id == $item->user_gui_id and $item->user_traloi_id ==0)
                                    <a href="" class="btn-icon ms-2 py-1 btn btn-sm btn-primary size-15"><i class="bx bx-edit-alt"></i>Sửa nội dung ý kiến</a>
                                    @endif
                                    @if ((Auth::user()->id == $item->user_gui_id and $item->user_traloi_id ==0) or Auth::user()->permissions_id > 1 )
                                    <form method="POST" action="" id="del_form_">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn-icon py-1 btn btn-sm btn-danger px-1 mx-2 size-14 confirm_delete" data_id="" type="button" ><i class="bx bx-trash-alt"></i> Xóa ý kiến</button>
                                    </form>
                                    @endif
                                    <button class="btn btn-warning btn-sm" onclick="theodoi_ykien({{$item->id}})"><i class="bx bx-bell"></i></button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    
</div>

@endsection

@section('js')

<script>
    function theodoi_ykien(id){
        $.ajax({
            url : "{{route('ajax')}}",
            type : "post",
            dataType:"text",
            data : {
                _token  :   '{{csrf_token()}}',
                atc     :   'theodoi_ykien',
                y_kien_id :   id
            },
            success : function (result){
                swal("Đã thêm vào danh sách theo dõi", {
                    icon: "success",
                    timer: 2000
                });
            }
        });
    }
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>

@endsection