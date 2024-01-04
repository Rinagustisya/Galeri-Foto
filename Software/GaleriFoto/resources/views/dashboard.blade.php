@extends('layouts.master', ['title'=>'Dashboard'])

@section('content')
<div class="jumbotron">
   <div class="card" style="background-color: #ecf0f1; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <div style="background-color: #3498db; height: 5px; width: 50px; margin-bottom: 10px;"></div>
            <h3 style="color: black; font-weight: bold;">Selamat Datang, {{ Auth::user()->nama_lengkap }}</h3>
        </div>
   </div>
</div>
@endsection
