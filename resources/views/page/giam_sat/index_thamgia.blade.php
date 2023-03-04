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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách giám sát đang tham gia</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row g-3">
        @foreach ($datas as $item)
        <div class="col-md-6 col-12" id="giamsat_{{$item->id}}">
            <div class="card radius-10">
                <div class="card-body">
                    <h5 class="card-title size-16 mb-3"><i class="bx bx-star"></i> {{$item->ten	}}</h5>
                    <div class="card-text mb-3" id="conent_{{$item->id}}" style="display: none;width: 700px;max-width: 100%;">
                        <h6>Nội dung giám sát</h6>
                        <hr>
                        {!!$item->noi_dung!!}
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex">
                            <div class="kyhop_icon">
                                <i class="bx bx-calendar"></i>
                            </div>
                            <div class="thongtin_kyhop">
                                <span>Thời gian giám sát</span><br>
                                <b>{{date('d/m/Y',strtotime($item->thoi_gian_star))}} <i class="bx bx-right-arrow-alt"></i> {{date('d/m/Y',strtotime($item->thoi_gian_end))}}</b>
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
                    <hr>
                    <div class="align-items-center text-center gap-2" >
                        <a href="{{route('giam-sat.show',$item->id)}}" class="btn btn-info btn-sm"><i class="bx bx-show-alt"></i> Thông tin</a>
                        <a href="{{route('thamgiagiamsat.noidung',$item->id)}}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i> Tham gia giám sát</a>
                        @if ($item->vai_tro==3)
                        <button  class="btn btn-danger btn-sm" onclick="dong_giamsat('{{$item->id}}')"><i class="bx bx bx-x"></i> Hoàn thành</button>
                        @endif
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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script>

    function dong_giamsat(id){
        swal({
            title: "Xác nhận hoàn thành giám sát?",
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
                        _token      :   '{{csrf_token()}}',
                        atc         :   'hoanthanh_giamsat',
                        id_giamsat:   id
                    },
                    success : function (){
                        $('#giamsat_'+id).remove();
                    }
                });
            } else {
                //swal("Your imaginary file is safe!");
            }
        });
        
    }
    Fancybox.bind("[data-fancybox]", {});
    @if (session('success'))
    $.notify("{{session('success')}}", "success");
    @endif

    @if (session('errors'))
    $.notify("{{session('errors')}}", "error");
    @endif

</script>
@endsection