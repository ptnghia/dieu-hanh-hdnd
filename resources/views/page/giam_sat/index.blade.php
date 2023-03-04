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
                    <li class="breadcrumb-item active" aria-current="page">Danh sách hoạt động giám sát</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('giam-sat.create')}}" class="btn btn-primary size-14"><i class="lni lni-circle-plus"></i> Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="card radius-10">
        <div class="card-body">
            <form method="POST" action="{{route('van-ban.search')}}" id="search-vb">
                <div class="form-tukhoa mb-3">
                    <input type="text" name="ten_vn" value="" placeholder="Nhập tên hoạt động giám sát" class="form-control">
                    <button type="submit" name="search" class="btn btn-timvb"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
                
            </form>
            <div class="table-responsive">
                
                <table class="table-head table table-striped table-bordered table-hover table_vanban" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Tên hoạt động giám sát</th>
                            <th class="text-center">Thời gian tổ chức</th>
                            <th class="text-center">Tài liệu</th>
                            <th class="text-center"  style="width: 100px">Trạng thái</th>
                            <th class="text-center" style="width: 100px">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $row)
                        <tr>
                            <td>{{$row->ten}}</td>
                            <td class="text-center">Từ {{date('d/m/Y', strtotime($row->thoi_gian_star))}} đến {{date('d/m/Y', strtotime($row->thoi_gian_end))}}</td>
                            <td class="text-center td-inline">
                                @if ($edit==1 or $row->created_user == Auth::user()->id)
                                <a href="{{route('giam-sat.thanh-vien.index', $row->id)}}" class="btn-icon mx-1 btn btn-sm btn-primary px-2 size-14"><i class="bx bx-user"></i> Thành viên đoàn</a>
                                <a href="{{route('giam-sat.lich-trinh.index', $row->id)}}" class="btn-icon mx-1 btn btn-sm btn-info px-2 size-14"><i class="bx bx-calendar-edit"></i> Lịch trình</a>
                                @endif
                                <a href="" class="btn-icon mx-1 btn btn-sm btn-danger px-2 size-14"><i class="bx bx-file-blank"></i> Báo cáo</a>
                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{route('giam-sat.show',$row->id)}}" class="btn-icon mx-1 btn btn-sm btn-info px-2 size-14"><i class="bx bx-show-alt"></i> Chi tiết</a>
                                    @if ($create==1 or $row->created_user == Auth::user()->id)
                                    <a href="{{route($data_fix['module']['slug'].'.edit',$row->id)}}" class="btn-icon mx-1 btn btn-sm btn-warning px-2 size-14"><i class="bx bx-edit-alt"></i> Sửa</a>
                                    @endif
                                    @if ($del==1)
                                    <form method="POST" action="{{route($data_fix['module']['slug'].'.destroy',$row->id)}}" id="del_form_{{$row->id}}">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn-icon btn btn-sm btn-danger px-1 mx-2 size-14 confirm_delete" data_id="{{$row->id}}" type="button" ><i class="bx bx-trash-alt"></i> Xóa</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
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

<script>
       
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
                $.notify("Cập nhật thành công", "success");
            }
        });
    })
</script>
@endsection