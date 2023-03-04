@extends('layouts.main')

@section('title')
{{$title_page}}
@endsection
@section('css_file')
<link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
@endsection
@section('css')
<style>
</style>    
@endsection

@section('content')
<div class="page-content">
    
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Sự kiện sắp diễn ra</h6>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Thông báo mới</h6>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Khiếu nại - tố cáo đang quan tâm</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Ý kiến cử tri đang quan tâm</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Hoạt động giám sát</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7 col-xl-8 border-end">
                            
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection
@section('js')
<script>
   
    @if (session('success'))
    //$.notify("{{session('success')}}", "success");
    swal("{{session('success')}}", "", "success", {button: false,timer: 2000 });
    @endif

    @if (session('errors'))
    //$.notify("{{session('errors')}}", "error");
    swal("{{session('errors')}}", "", "warning", {button: false,timer: 2000 });
    @endif

</script>
<script>
</script>    
@endsection