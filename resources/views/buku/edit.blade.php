@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Data Order </div>

                <div class="card-body">
                <form action="{{ route('buku.update', $buku->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label class="form-label">nama buku</label>
                        <input type="name" class="form-control" name="nama_buku" value="{{ $buku->nama_buku }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">harga </label>
                        <input type="number" class="form-control" name="harga" value="{{ $buku->harga }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">stok </label>
                        <input type="number" class="form-control" name="stok" value="{{ $buku->stok }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">image</label>
                        <input type="file" class="form-control" name="image" value="{{ $buku->image }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label>id Penerbit</label>
                        <select class="form-control" name="id_penerbit">
                            @foreach($penerbit as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $buku->id_penerbit ? 'selected' : '' }}>{{ $data->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">tanggal terbit </label>
                        <input type="date" class="form-control" name="tanggal_terbit" value="{{ $buku->tanggal_terbit }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>id genre</label>
                        <select class="form-control" name="id_genre">
                            @foreach($genre as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $buku->id_genre ? 'selected' : '' }}>{{ $data->genre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection