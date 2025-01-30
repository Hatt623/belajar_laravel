@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('tampilan Data Order') }}</div>

                <div class="card-body">
                    <form action="{{ route('order.update' , $order->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">

                            <label>Product Name</label>
                            <select class="form-control mb-3" name="id_product" required disabled>
                                @foreach($product as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $order->id_product ? 'selected' : ''}}> {{ $data->name_product }}</option>
                                @endforeach
                            </select>

                            <label>Quantity</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert order Quntity" name="quantity" min="1" value="{{ $order->quantity }}" required disabled>

                            <label>Order Date </label>
                            <input type="date" class="form-control mb-3" placeholder="Insert order brand" name="order_date" value="{{ $order->order_date }}" required disabled>

                            <label>Customer Name</label>
                            <select class="form-control mb-3" name="id_customer" required disabled>
                                @foreach($customer as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $order->id_customer ? 'selected' : ''}}> {{ $data->name_customer }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('order.index') }}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
