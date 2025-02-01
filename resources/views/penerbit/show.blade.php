@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Data Siswa penerbit</div>

                <div class="card-body">
                <form action="{{ route('penerbit.store')}}" method="post" enctype="multipart/form-data">
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
                        <label class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" name="nama_penerbit" disabled value="{{ $penerbit->nama_penerbit }}">
                    </div>
                    <a href="{{route('penerbit.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
