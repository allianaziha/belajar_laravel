@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Transaksi</div>

                <div class="card-body">
                <form action="{{ route('transaksi.store')}}" method="post" enctype="multipart/form-data">
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
                    <div class="form-group mb-2">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">tanggal transaksi </label>
                        <input type="date" class="form-control" name="tanggal_transaksi">
                    </div>
                    <div class="form-group mb-3">
                        <label>id buku</label>
                        <select class="form-control" name="id_buku">
                            @foreach($buku as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>id pembeli</label>
                        <select class="form-control" name="id_pembeli">
                            @foreach($pembeli as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_pembeli }}</option>
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
