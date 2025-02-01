@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PRODUK</div>

                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <a href="{{ route('produk.create') }}" class="btn btn-primary">Add</a>
                <table class="table">
                    <thead>
                        <tr>    
                            <th scope="col">No</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">stok</th>
                            <th scope="col">ID kategori</th>
                            <th scope="col">cover</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 ; @endphp
                        @foreach ($produk as $data)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$data->nama_produk}}</td>
                            <td>{{$data->harga}}</td>
                            <td>{{$data->stok}}</td>
                            <td>{{$data->kategori->nama_kategori}}</td>
                            <td>
                                <img src="{{ asset('/images/produk/'. $data->cover) }}" width="100">
                            </td>
                            <td>
                            <form action="{{ route('produk.destroy', $data->id) }}" method="POST">
                                <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('produk.show', $data->id) }}" class="btn btn-warning">Show</a>
                                <form action="{{ route('produk.destroy', $data->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger " onClick="return confirm('apakah anda yakin') ">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
