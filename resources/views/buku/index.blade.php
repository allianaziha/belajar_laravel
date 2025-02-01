@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">BUKU</div>

                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> 
                    @endif
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">Add</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">nama Buku</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Image</th>
                            <th scope="col">Id penerbit</th>
                            <th scope="col">tanggal terbit</th>
                            <th scope="col">Id genre</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 ; @endphp
                        @foreach ($buku as $data)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$data->nama_buku}}</td>
                            <td>{{$data->harga}}</td>
                            <td>{{$data->stok}}</td>
                           <td>
                                <img src="{{ asset('images/buku/'.$data->image) }}" width="100">
                            </td>
                            <td>{{$data->penerbit->nama_penerbit}}</td>
                            <td>{{$data->tanggal_terbit}}</td>
                            <td>{{$data->genre->genre}}</td>
                            
                            <td>
                                <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('buku.show', $data->id) }}" class="btn btn-warning">Show</a>
                                <form action="{{ route('buku.destroy', $data->id) }}" method="POST" style="display:inline">
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
