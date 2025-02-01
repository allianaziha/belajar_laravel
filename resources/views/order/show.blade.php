@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Order </div>

                <div class="card-body">
                <form action="{{ route('order.store', $order->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label>id product</label>
                        <select class="form-control" name="id_product" disabled>
                            @foreach($product as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $order->id_product ? 'selected' : '' }}>{{ $data->name_product }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">quantity </label>
                        <input type="number" class="form-control" disabled name="quantity" value="{{ $order->quantity }}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">order date </label>
                        <input type="date" class="form-control" disabled name="order_date" value="{{ $order->order_date }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>id customer</label>
                        <select class="form-control" name="id_customer" disabled>
                            @foreach($customer as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $order->id_customer ? 'selected' : '' }}>{{ $data->name_customer }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{route('order.index')}}" class="btn btn-primary">Kembali</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection