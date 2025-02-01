@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data customer</div>

                <div class="card-body">
                <form action="{{ route('customer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Name Customer </label>
                        <input type="text" class="form-control" disabled name="name_product" value="{{ $customer->name_customer }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Gender </label>
                        <div class="d-flex align-items-center gap-3" disabled>
                            <div>
                                <input type="radio" name="gender" disabled id="laki-laki" value="Laki-Laki" {{ $customer->gender == 'Laki-Laki' ? 'checked' : '' }}>
                                <label for="male">Laki-Laki</label>
                            </div>
                            <div>
                                <input type="radio" name="gender" disabled id="perempuan" value="Perempuan" {{ $customer->gender == 'Perempuan' ? 'checked' : '' }}>
                                <label for="female">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">contact </label>
                        <input type="number" class="form-control" disabled name="contact" value="{{ $customer->contact }}">
                    </div>
                    <a href="{{route('product.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
