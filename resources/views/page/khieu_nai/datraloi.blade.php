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
                    <li class="breadcrumb-item active" aria-current="page">Đã trả lời</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('khieu-nai.create')}}" class="btn btn-primary size-14"><i class="lni lni-circle-plus"></i> Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="row g-3">
        @foreach ($datas_new as $item)
        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body khieu_nai_item">
                    <div class="d-flex align-items-center">
                        <div class="text-center khieu_nai_item_left">
                            <img src="{{asset($item->hinh_anh1)}}" class="rounded-circle p-1 border" width="90" height="90" alt="{{$item->name1}}">
                            <h5 class=" size-14" style="white-space: nowrap;">{{$item->name1}}</h5>
                        </div>
                        
                        <div class="flex-grow-1 ms-3 khieu_nai_item_right">
                            <h5 class="mt-0 size-16">{{$item->tieu_de}}</h5>
                            <div class="mb-3"><i class="bx bx-calendar"></i> {{date('d/m/Y', strtotime($item->ngay_khieu_nai))}}  - <i class="bx bx-purchase-tag"></i> {{$item->ten}}</div>
                            <div class="mb-3" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">
                                {!!$item->noi_dung_khieu_nai!!}
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <div class="col"><img src="{{asset($item->hinh_anh2)}}" class="rounded-circle p-1 border" width="30" height="30" alt="{{$item->name2}}">  {{$item->name2}} đã trả lời  - <i class="bx bx-calendar"></i> {{date('d/m/Y', strtotime($item->ngay_tra_loi))}}</div>
                                </div>
                                <div class=" d-flex justify-content-end">
                                    <a href="{{route('khieu-nai.show', $item->id)}}" class="btn-icon py-1 btn btn-sm btn-info size-15"><i class="bx bx-detail"></i>Chi tiết</a>
                                    @if (Auth::user()->id == $item->user_gui_id and $item->user_traloi_id ==0)
                                    <form method="POST" action="" id="del_form_">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn-icon py-1 btn btn-sm btn-danger px-1 mx-2 size-14 confirm_delete" data_id="" type="button" ><i class="bx bx-trash-alt"></i> Xóa Khiếu nại</button>
                                    </form>
                                    @endif
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
    var  sound_Path='{{asset('assets/plugins/notifications/sounds/')}}/'
</script>
<link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" />
<script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
<script>
    
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/vi.json"
            }
        });
    });
   
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
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    size: 'mini',
                    rounded: true,
                    icon: 'bx bx-check-circle',
                    delayIndicator: false,
                    sound: '{{asset('assets/plugins/notifications/sounds/sound2.ogg')}}', 
                    continueDelayOnInactiveTab: false,
                    sound: true,  
                    position: 'top right',
                    msg: 'Cập nhật thành công'
                });
            }
        });
    })
</script>
@endsection