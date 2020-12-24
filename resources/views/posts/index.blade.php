@extends('template')

@section('content')

<div class="row spacer">
    <div class="col-md-12">
        <h1 class="text-center">List Produk</h1>

    </div>
</div>

@foreach($posts->chunk(2) as $item)
<div class="row spacer">
    @foreach ($item as $post)
    <div class="col-md-6 mb-4">
        <div class="card listProduct">
            <img class="card-img-top pasfoto" src="{{asset('images/' . $post->path_img)}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{$post->nama}}</p>
                <p class="card-text">{{$post->deskripsi}}</p>
                <p class="card-text">{{$post->harga}}</p>
                <p class="card-text">{{$post->jumlah}}</p>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach
{!! $posts->links() !!}
@endsection