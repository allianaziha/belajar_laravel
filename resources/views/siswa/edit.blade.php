@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Siswa</div>

                <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label class="form-label">Nis</label>
                        <input type="number" class="form-control" name="nis" value="{{ $siswa->nis }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" value="{{ $siswa->jenis_kelamin }}">Jenis_Kelamin</label>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki"> laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan"> perempuan
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Kelas</label>              
                        <select class="form-control" name="kelas">
                            <option value="XI RPL 1">XI RPL 1</option>
                            <option value="XI RPL 2">XI RPL 2</option>
                            <option value="XI RPL 3">XI RPL 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">cover</label>
                        <img src="{{ asset('/images/siswa/' . $siswa->cover) }}" width="100" alt="">
                        <input type="file" class="form-control" name="cover" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
