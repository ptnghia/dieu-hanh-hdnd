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
    
    <!--end row-->
    
    <!--end row-->
    
    
    <!--end row-->
    
    <!--end row-->
</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<script>
</script>    
@endsection