@extends('template')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="spacer"></div>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Input data produk</h1>
    </div>

</div>
<div class="spacer"></div>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label for="exampleInputEmail1">Nama Produk</label>
            <div class="form-group">
                <input type="text" name="nama" value="{{ $post->nama }}" class="form-control" placeholder="RAM ..." required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="exampleInputEmail1">Deskripsi</label>
            <div class="form-group">
                <textarea type="text" name="desk" class="form-control" placeholder="08xxx" required>{{ $post->deskripsi }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="exampleInputEmail1">Harga</label>
            <div class="form-group">
                <input type="number" name="harga" value="{{ $post->harga }}" class="form-control" placeholder="Padang" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="exampleInputEmail1">Jumlah</label>
            <div class="form-group">
                <input type="number" name="jumlah" value="{{ $post->jumlah }}" class="form-control" placeholder="Padang" required>
            </div>
        </div>
    </div>

    <label for="exampleInputEmail1">Gambar Produk</label><br />
    <input type="file" name="gambar" placeholder="Choose image" id="image" required>
    <br /><br /><br />
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
    </div>

</form>
<div class="spacer"></div>
@endsection