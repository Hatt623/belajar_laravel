@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data order') }}</div>

                <div class="card-body">
                    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">

                            <label>Product Name</label>
                            <select class="form-control mb-3" name="id_product">
                                @foreach($product as $data)
                                    <option value="{{ $data->id }}">{{ $data->name_product }}</option>
                                @endforeach
                            </select>

                            <label>Quantity</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert order Quntity" name="quantity" min="1" required>

                            <label>Order Date </label>
                            <input type="date" class="form-control mb-3" placeholder="Insert order brand" name="order_date" required>

                            <label>Customer Name</label>
                            <select class="form-control mb-3" name="id_customer">
                                @foreach($customer as $data)
                                    <option value="{{ $data->id }}">{{ $data->name_customer }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
