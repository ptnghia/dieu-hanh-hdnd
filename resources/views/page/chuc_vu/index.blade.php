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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách chức vụ</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('chuc-vu.create')}}" class="btn btn-primary size-14"><i class="lni lni-circle-plus"></i> Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table-head table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px">STT</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center"  style="width: 100px">Hiển thị</th>
                                    <th class="text-center" style="width: 100px">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $row)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$row->ten}}</td>
                                    <td class="text-center">
                                        <input type="checkbox" {{$row->trang_thai ==1?'checked':''}}  name="trang_thai" class="form-check-input check_ajax" data_col="trang_thai" data_table ="chuc_vus" data_id="{{$row->id}}" >
                                    </td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="{{route('chuc-vu.edit',$row->id)}}" class="btn-icon mx-1 btn btn-sm btn-warning px-2 size-14"><i class="bx bx-edit-alt"></i> Sửa</a>
                                        <form method="POST" action="{{route('chuc-vu.destroy',$row->id)}}">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn-icon btn btn-sm btn-danger px-1 mx-2 size-14"><i class="bx bx-trash-alt"></i> Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Đại Biểu Hội Đồng Nhân Dân</p>
                            <h4 class="my-1 size-18">100 Người</h4>
                        </div>
                        <div class="widgets-icons bg-light-info text-info ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Cán Bộ VP Đoàn ĐBQH và HĐND</p>
                            <h4 class="my-1 size-18">50 Đồng Chí</h4>
                        </div>
                        <div class="widgets-icons bg-light-info text-info ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Thành viên khác</p>
                            <h4 class="my-1 size-18">10 Đồng Chí</h4>
                        </div>
                        <div class="widgets-icons bg-light-info text-info ms-auto"><i class="bx bxs-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        size: 'mini',
        rounded: true,
        icon: 'bx bx-check-circle',
        delayIndicator: false,
        sound: '{{asset('assets/plugins/notifications/sounds/sound2.ogg')}}', 
        continueDelayOnInactiveTab: false,
        position: 'top right',
        msg: '{{session('success')}}'
    });
    @endif
    @if (session('errors'))
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        icon: 'bx bx-x-circle',
        sound: '{{asset('assets/plugins/notifications/sounds/sound2.ogg')}}',  
        msg: '{{session('errors')}}'
    });
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