@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Product</div>

                <div class="card-body">
                <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label">Name Product </label>
                        <input type="text" class="form-control" name="name_product" disabled value="{{ $product->name_product }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Merk </label>
                        <input type="text" class="form-control" name="merk" disabled value="{{ $product->merk }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Price </label>
                        <input type="number" class="form-control" name="price" disabled value="{{ $product->price }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Stock </label>
                        <input type="text" class="form-control" name="stock" disabled value="{{ $product->stock }}">
                    </div>
                    <a href="{{route('product.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
