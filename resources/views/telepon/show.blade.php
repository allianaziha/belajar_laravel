@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Telepon</div>

                <div class="card-body">
                <form action="{{ route('telepon.store', $telepon->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label class="form-label">Nomor</label>
                        <input type="text" class="form-control" name="nomor" value="{{ $telepon->nomor }}" disabled >
                    </div>
                    <div class="form-group mb-3">
                        <label>id pengguna</label>
                        <select class="form-control" name="id_pengguna" disabled>
                            @foreach($pengguna as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $telepon->id_pengguna ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{route('telepon.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
