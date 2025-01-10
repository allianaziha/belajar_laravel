@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Siswa PPDB</div>

                <div class="card-body">
                <form action="{{ route('ppdb.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" disabled value="{{ $ppdb->nama_lengkap }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jenis_Kelamin</label>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" disabled value="{{ $ppdb->jenis_kelamin }}"> laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan" disabled value="{{ $ppdb->jenis_kelamin }}"> perempuan
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Agama</label>
                        <input type="text" class="form-control" name="agama" disabled value="{{ $ppdb->agama }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" disabled placeholder="{{ $ppdb->alamat }}"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Telepon</label>
                        <input type="number" class="form-control" name="telepon" disabled value="{{ $ppdb->telepon }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Asal sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah" disabled value="{{ $ppdb->asal_sekolah }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
