@extends('template')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">
            Manajemen Produk
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php ($count = 1)
                @foreach ($posts as $post)

                <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$post->nama}}</td>
                    <td>{{$post->deskripsi}}</td>
                    <td>{{$post->harga}}</td>
                    <td>{{$post->jumlah}}</td>
                    <td>
                        <a href="{{ url('edit',$post->id)}}">
                            <button type="button" class="btn btn-danger ">Update</button>
                        </a>
                        <a href="{{ url('delete',$post->id)}}">
                            <button type="button" class="btn btn-danger ">Delete</button>
                        </a>
                    </td>
                </tr>
                @php ($count++)
                @endforeach
            </tbody>
        </table>
    </div>
</div>



{!! $posts->links() !!}
@endsection