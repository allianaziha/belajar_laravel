@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Tambah Data Siswa</div>

                <div class="card-body">
                <form action="{{ route('pembeli.update', $pembeli->id)}}" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">Nama Pembeli</label>
                        <input type="text" class="form-control" name="nama_pembeli" value="{{ $pembeli->nama_pembeli}}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" value="{{ $pembeli->jenis_kelamin }}" disabled>Jenis Kelamin</label>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" disabled> laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan" disabled> perempuan
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" >Telepon</label>
                        <input type="number" class="form-control" name="telepon" value="{{ $pembeli->telepon }}" disabled>
                    </div>
                    <a href="{{ route('pembeli.index') }}" class="btn btn-primary">Back</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
