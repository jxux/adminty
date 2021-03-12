@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header_title')
    <div class="page-header-title">
        <div class="d-inline">
            <h4>Sample Page</h4>
            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
        </div>
    </div>
@stop

@section('content_header_link')
    <li class="breadcrumb-item">
        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">Widget</a> </li>

@stop

@section('content')
<div class="col-sm-12">
    <div class="card">        
        <div class="card-header">
            <h5>Hello Card</h5>
            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-trash-2 close-card"></i></li>
                </ul>
                
            </div>
        </div>
        <div class="card-block">
            {{-- {{ session('status') }} --}}
            <p>
                "Texto dentro del home"
            </p>
        </div>
    </div>
</div>
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
@stop
