@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Produk') }}</div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">

                            <label>Nama </label>
                            <input type="text" class="form-control mb-3" placeholder="Insert product name" name="name_product" value="{{ old('name_product') }}" required>

                            <label>Brand </label>
                            <input type="text" class="form-control mb-3" placeholder="Insert product brand" name="merk" value="{{ old('merk') }}" required>


                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert product price" name="price" min="1" value="{{ old('price') }}" required>

                            <label>Stock</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert Product stock" name="stock" min="0" value="{{ old('stock') }}" required>

                            <div class="form-group">
                                <label> Cover </label>
                                <input type="file" class="form-control mb-3" name="cover" value="{{old('cover')}}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
