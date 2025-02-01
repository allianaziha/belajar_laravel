@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Buku</div>

                <div class="card-body">
                <form action="{{ route('buku.store')}}" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="{{ $transaksi->jumlah }}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">tanggal transaksi </label>
                        <input type="date" class="form-control" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>id Buku</label>
                        <select class="form-control" name="id_buku" disabled>
                            @foreach($buku as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_buku ? 'selected' : '' }}>{{ $data->nama_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>id pembeli</label>
                        <select class="form-control" name="id_pembeli" disabled>
                            @foreach($pembeli as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_pembeli ? 'selected' : '' }}>{{ $data->nama_pembeli }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{route('transaksi.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection