@extends('layouts.master', ['title'=>'Data Foto'])

@section('content')
<div class="jumbotron">
   <div class="card">
        <div class="card-body">
            <h3>Selamat Datang  {{ Auth::user()->username }}</h3>
        </div>
   </div>
</div>
@endsection