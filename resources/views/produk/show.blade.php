@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Data Produk</div>

                <div class="card-body">
                <form action="{{ route('produk.store', $produk->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label class="form-label">nama produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" value="{{ $produk->harga }}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Stok</label>
                        <input type="text" class="form-control" name="stok" value="{{ $produk->stok }}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>id kategori</label>
                        <select class="form-control" name="id_kategori" disabled>
                            @foreach($kategori as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                <a href="{{route('produk.index')}}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
