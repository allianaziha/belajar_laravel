@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Siswa</div>

                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">Add</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis kelamin</th>
                            <th scope="col">kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 ; @endphp
                        @foreach ($siswa as $data)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jenis_kelamin}}</td>
                            <td>{{$data->kelas}}</td>
                            <td>
                                <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-warning">Show</a>
                                <form action="{{ route('siswa.destroy', $data->id) }}" method="POST" style="display:inline">
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