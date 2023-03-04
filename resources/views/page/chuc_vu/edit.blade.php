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
                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-8">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Chỉnh sửa chức vụ</h5>
                        
                    </div>
                    <hr>
                    <form class="g-3" method="POST" action="{{ route('chuc-vu.update', $dataId->id)}}">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$dataId->id}}" />
                        <div class="mb-3 row">
                            <label for="inputTen" class="text-end col-sm-2 col-form-label">Tên chức vụ</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('ten') ?? $dataId->ten}}"  name="ten" class="form-control @error('ten') is-invalid @enderror" id="inputTen">
                                @error('ten')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputStt" class="text-end col-sm-2 col-form-label">Số thứ tự</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{old('stt') ?? $dataId->stt}}" name="stt" class="form-control @error('stt') is-invalid @enderror" id="inputStt">
                                @error('stt')
                                    <span class="invalid-feedback" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="inputStt" class="text-end col-sm-2 col-form-label"></label>
                            <div class=" col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" {{$dataId->trang_thai==1?'checked':''}} name="trang_thai"  type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">Hiển thị</label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="text-end">
                            <a href="{{route('chuc-vu.index')}}" class="btn btn-default px-3"><i class="bx bx-undo"></i> Quay lại</a>
                            <button type="submit" class="btn btn-primary px-3"><i class="bx bx-save"></i> Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('js')
@endsection