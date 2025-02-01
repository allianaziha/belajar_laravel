@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Tambah Data Pembeli</div>
                <div class="card-body">
                <form action="{{ route('pembeli.store')}}" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">Nama Pembeli</label>
                        <input type="text" class="form-control" name="nama_pembeli">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki"> laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan"> perempuan
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Telepon</label>
                        <input type="number" class="form-control" name="telepon">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
