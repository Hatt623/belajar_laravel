@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Produk') }}</div>

                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control mb-3" placeholder="Insert product name" name="name_product" value="{{ $product->name_product }}" required disabled>

                            <label>Brand </label>
                            <input type="text" class="form-control mb-3" placeholder="Insert product brand" name="merk" value="{{ $product->merk }}" required disabled>


                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert product price" name="price" min="1" value="{{ $product->price }}" required disabled>

                            <label>Stock</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert Product stock" name="stock" min="0" value="{{ $product->stock }}" required disabled>
                        </div>
                        
                        <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
