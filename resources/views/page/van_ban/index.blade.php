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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách văn bản</li>
                </ol>
            </nav>
        </div>
        @if(Auth::user()->permissions_id>1)
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('van-ban.create')}}" class="btn btn-primary size-14"><i class="lni lni-circle-plus"></i> Thêm mới</a>
            </div>
        </div>
        @endif
    </div>
    <div class="card radius-10">
        <div class="card-body">
            <form method="POST" action="{{route('van-ban.search')}}" id="search-vb">
                <div class="form-tukhoa mb-3">
                    <input type="text" name="ten_vn" value="" placeholder="Nhập từ khóa văn bản cần tìm" class="form-control">
                    <button type="submit" name="search" class="btn btn-timvb"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
                <div class="row box-search">
                    <div class="col-sm-2 p5 mb-3">
                        <input onchange="$('#search-vb').submit()" type="text" name="ma_sp" value="" placeholder="Số hiệu - ký hiệu" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control single-select" name="extra2" onchange="$('#search-vb').submit()">
                            <option value="">Chọn loại văn bản</option>
                            <option value="2">Hiến pháp</option>
                            <option value="3">Luật</option>
                            <option value="4">Pháp lệnh</option>
                            <option value="18">Nghị định</option>
                            <option value="24">Thông tư </option>
                            <option value="25">Quyết định </option>
                            <option value="35">Nghị quyết</option>
                            <option value="37">Thông báo</option>
                            <option value="49">Chỉ thị</option>
                        </select>
                    </div>
                    <div class="col-sm-3  mb-3">
                        <select class="form-control single-select" name="extra5" onchange="$('#search-vb').submit()">
                            <option value="">Chọn Lĩnh vực</option>
                            <option value="9">Quốc phòng</option>
                            <option value="10">An ninh</option>
                            <option value="28">Giao thông vận tải</option>
                            <option value="29">Đường thủy nội địa</option>
                            <option value="34">Thanh tra</option>
                            <option value="36">Cải cách hành chính</option>
                            <option value="38">Xử phạt vi phạm hành chính</option>
                            <option value="39">Dịch vụ công trực tuyến</option>
                            <option value="46">Phòng, chống tham nhũng</option>
                            <option value="47">Giải quyết Khiếu nại, Tố cáo</option>
                            <option value="48">Tiếp công dân</option>
                            <option value="51">Thực hành tiết kiệm, phòng, chống lãng phí</option>
                        </select>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <select class="form-control single-select" name="extra3" onchange="$('#search-vb').submit()">
                            <option value="">Chọn hiệu lực</option>
                            <option value="15">Sắp có hiệu lực</option>
                            <option value="16">Còn hiệu lực</option>
                            <option value="19">Hết hiệu lực</option>
                            <option value="50">Hết hiệu lực một phần</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <select class="form-control single-select" name="extra4" onchange="$('#search-vb').submit()">
                            <option value="">Chọn cơ quan ban hành</option>
                            <option value="11">Ban Bí thư</option>
                            <option value="12">Bộ Giao thông vận tải</option>
                            <option value="17">Chính phủ</option>
                            <option value="21">Bộ Tài chính</option>
                            <option value="22">Ủy ban nhân dân</option>
                            <option value="23">Bộ công an </option>
                            <option value="33">Quốc Hội</option>
                            <option value="42">Thủ tướng</option>
                            <option value="43">Bộ Nội vụ</option>
                            <option value="44">Văn phòng Chính phủ</option>
                            <option value="45">Bộ Chính trị</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                
                <table class="table-head table table-striped table-bordered table-hover table_vanban" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px">STT</th>
                            <th class="text-center">Tên văn bản</th>
                            <th class="text-center">Thông tin</th>
                            <th class="text-center">Tài liệu</th>
                            @if(Auth::user()->permissions_id>1)
                            <th class="text-center"  style="width: 100px">Hiển thị</th>
                            <th class="text-center" style="width: 100px">Tác vụ</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $row)
                        <tr>
                            <td class=" text-center">{{$key+1}}</td> 
                            <td>
                                <a class="ten_vb" href="{{route('van-ban.show','1')}}">{{$row['ten']}}</a>
                                <div>
                                    <span class="text_hieuluc">Hiệu lực: {{date('d/m/Y', strtotime($row['hieu_luc']))}}</span>
                                    
                                    
                                </div>
                             </td> 
                             <td>
                                 <ul class="list-ct-vb">
                                     <li style="white-space: nowrap;"><span>Số hiệu:</span> {{$row['so_hieu']}} </li>
                                     <li style="white-space: nowrap;"><span>Loại:</span> {{$row['loai_vanban_id']}}  </li>
                                     <li style="white-space: nowrap;"><span>Cơ quanc:</span> {{$row['coquan_banhanh_id']}} </li>
                                     <li style="white-space: nowrap;"><span>Cập nhật:</span> {{date('d/m/Y', strtotime($row['updated_at']))}} </li>
                                 </ul>
                             </td>
                             <td>
                                @foreach ($row['file'] as $row_file)
                                    <a class="Link_download" style="display: block;width: 200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-size: 13px;" href="{{asset($row_file->file_url)}}" target="_blank">
                                        <span class="ext_file">{{$row_file->file_ext}}</span> {{$row_file->file_name}}
                                    </a>
                                @endforeach
                             </td>
                             @if(Auth::user()->permissions_id>1)
                             <td class="text-center">
                                 <input type="checkbox" name="trang_thai" {{$row['trang_thai']==1 ? 'checked' : ''}} class="form-check-input check_ajax" data_col="trang_thai" data_table ="van_ban" data_id="{{$row['id']}}" >
                             </td>
                             <td class="text-center ">
                                 <div class="d-flex justify-content-center">
                                     <a href="{{route($data_fix['module']['slug'].'.edit',$row['id'])}}" class="btn-icon mx-1 btn btn-sm btn-warning px-2 size-14"><i class="bx bx-edit-alt"></i> Sửa</a>
                                     <form method="POST" action="{{route($data_fix['module']['slug'].'.destroy',$row['id'])}}" id="del_form_{{$row['id']}}">
                                         @csrf
                                         {{ method_field('delete') }}
                                         <button class="btn-icon btn btn-sm btn-danger px-1 mx-2 size-14 confirm_delete" data_id="{{$row['id']}}" type="button" ><i class="bx bx-trash-alt"></i> Xóa</button>
                                     </form>
                                 </div>
                             </td>
                             @endif
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $allDatas->links() }}
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