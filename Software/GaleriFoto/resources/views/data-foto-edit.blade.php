@extends('layouts.master', ['title'=>'Data Foto Edit'])

@section('content')
<div class="jumbotron">
    <h3><b>Postingan</b></h3>
    <div class="card">
        <div class="card">
            <div class="card-header">
                {{ Auth::user()->nama_lengkap }}
            </div>
            <div class="card">
            </div>
        </div>
    </div>
</div>
@endsection