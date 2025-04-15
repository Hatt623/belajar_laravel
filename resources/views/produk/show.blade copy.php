@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tampilan Data Produk') }}</div>

                <div class="card-body">
                    <form action="{{ route('produk.update' , $produk->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan nama produk" name="nama_produk" value="{{$produk->nama_produk}}" required disabled>

                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Harga Produk" name="harga" min="1" value="{{$produk->harga}}" required disabled>

                            <label> Stok </label>
                            <input type="number" class="form-control mb-3" placeholder="Stok Harga" name="stok" min="0" value="{{$produk->stok}}" required disabled>
 
                            <label class="">Nama kategori</label>
                            <select class="form-control mb-3" name="id_kategori" disabled>
                                @foreach($kategori as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $produk->id_kategori ? 'selected' : '' }}>{{ $data->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label> Cover </label>
                                <img class="mb-3" src="{{ asset('images/produk/' . $produk->cover) }}" width="100px">
                            </div>
                        <a href="{{ route('produk.index') }}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
