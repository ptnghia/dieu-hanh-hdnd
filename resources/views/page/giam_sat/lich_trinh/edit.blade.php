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
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Lịch trình giám sát</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="lichtrinh">
                        @foreach ($data_lichtrinh as $row)
                        <!-- timeline item 1 -->
                        <div class="lichtrinh_item">
                            <div class="d-flex justify-content-between">
                                <div class="lichtrinh_item_time"> {{date('d/m/Y', strtotime($row->ngay))}}<br>{{$row->gio}}<br>
                                    <div class="d-flex justify-content-end mt-2">
                                        <a href="{{route('giam-sat.lich-trinh.edit', ['id' => $id_giamsat, 'id_lichtrinh' => $row->id])}}" class="btn-icon btn btn-sm btn-warning px-1 me-1 size-14"><i class="bx bx-edit-alt"></i></a>
                                        <form method="POST" action="{{route('giam-sat.lich-trinh.destroy', ['id' => $id_giamsat, 'id_lichtrinh' => $row->id] )}}" id="del_form_{{$row->id}}">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn-icon btn btn-sm btn-danger px-1 size-14 confirm_delete" data_id="{{$row->id}}" type="button" ><i class="bx bx-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="lichtrinh_item_content">
                                    <h4>{{$row->dia_diem}}</h4>
                                    <div class="noidung">
                                        {!!$row->thanh_phan_tham_du!!}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--/row-->
                        @endforeach
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0">Cập nhật lịch trình</h6>
                        </div>
                    </div>
                    <hr>
                    <form class="row g-3" method="POST" action="{{ route('giam-sat.lich-trinh.update', ['id' => $id_giamsat, 'id_lichtrinh' => $dataId->id])}}" id="upload_vanban">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$dataId->id}}" />
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="ngay" class="col-form-label">Ngày</label>
                            <input type="date" placeholder="Nhập ngày"  name="ngay" class="form-control @error('ngay') is-invalid @enderror" value="{{old('ngay') ?? $dataId->ngay}}" id="ngay">
                            @error('ngay')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <label for="gio" class="col-form-label">Giờ</label>
                            <input type="time" placeholder="Nhập giờ"  name="gio" class="form-control @error('gio') is-invalid @enderror" value="{{old('gio') ?? $dataId->gio }}" id="gio">
                            @error('gio')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-8">
                            <label for="gio" class="col-form-label">Địa điểm</label>
                            <input type="text" placeholder="Nhập địa điểm công tác"  name="dia_diem" class="form-control @error('dia_diem') is-invalid @enderror" value="{{old('dia_diem') ?? $dataId->dia_diem}}" id="dia_diem">
                            @error('dia_diem')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="gio" class="col-form-label">Tổ giám sát</label>
                            <select class="form-select form-control" name="giam_sat_nhom_id">
                                <option value="0">Chọn tổ công tác</option>
                                @foreach ($data_nhom as $value)
                                <option {{$dataId->giam_sat_nhom_id == $value->id ?'selected':''}} value="{{$value->id}}">{{$value->ten}}</option>
                                @endforeach
                            </select>
                            @error('dia_diem')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Thành phần tham dự</label>
                            <textarea name="thanh_phan_tham_du" id="thanh_phan_tham_du" rows="3" class="form-control @error('thanh_phan_tham_du') is-invalid @enderror">{{old('thanh_phan_tham_du') ?? $dataId->thanh_phan_tham_du}}</textarea>
                            @error('thanh_phan_tham_du')
                                <span class="invalid-feedback" role="alert">
                                    <i>{{ $message }}</i>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" name="save_exit" class="btn btn-primary px-3 btn-load"><i class="bx bx-save"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
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

<script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'thanh_phan_tham_du', {
        toolbar: [
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Font', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
            { name: 'insert', items: ['Table' ] },
        ],
        language: 'vi',
        skin: 'moono-lisa',
    });
</script>
@endsection