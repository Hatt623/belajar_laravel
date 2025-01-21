@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Produk') }}</div>

                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan nama produk" name="nama_produk" required>

                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Harga Produk" name="harga" min="1" required>

                            <label>Stok</label>
                            <input type="number" class="form-control mb-3" placeholder="Stok Harga" name="stok" min="0" required>
 
                            <label class="">Nama kategori</label>
                            <select class="form-control mb-3" name="id_kategori">
                                @foreach($kategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
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
