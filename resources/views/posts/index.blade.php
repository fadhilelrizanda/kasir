@extends('template')

@section('content')

@if ($message = Session::get('success'))
<div clas="row">
    <div class="col-md-12">
        <div class="alert alert-primary">
            <p>{{ $message }}</p>
        </div>
    </div>
</div>
@endif

<div class="row spacer">
    <div class="col-md-12">
        <h1 class="text-center titleProduct">Produk yang tersedia</h1>

    </div>
</div>
@php ($count = 1)
@foreach($posts->chunk(2) as $item)
<div class="row spacer">
    @foreach ($item as $post)


    <div class="col-md-6 mb-4">
        <div class="card listProduct">
            <button type="button" class="btn btn-block bgcolorneo">Produk {{$count}} </button>
            <img class="card-img-top pasfoto" src="{{asset('images/' . $post->path_img)}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Nama Produk : {{$post->nama}}</p>
                <p class="card-text">Deskripsi : {{$post->deskripsi}}</p>
                <p class="card-text">Harga : {{$post->harga}} $</p>
                <p class="card-text">Jumlah : {{$post->jumlah}} tersedia </p>

            </div>
        </div>
    </div>
    @php ($count++)
    @endforeach
</div>
@endforeach
{!! $posts->links() !!}
@endsection