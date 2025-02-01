@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Siswa Kategori</div>

                <div class="card-body">
                <form action="{{ route('kategori.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_kategori" disabled value="{{ $kategori->nama_kategori }}">
                    </div>
                    <a href="{{route('kategori.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
