@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Data Siswa Pengguna</div>

                <div class="card-body">
                <form action="{{ route('pengguna.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" disabled value="{{ $pengguna->nama }}">
                    </div>
                    <a href="{{route('pengguna.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
