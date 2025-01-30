@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Buku') }}</div>

                <div class="card-body">
                    <form action="{{ route('buku.update' , $buku->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')

                        <div class="form-group">

                            <label>Nama Buku</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama Buku" name="nama_buku" value="{{$buku->nama_buku}}" required disabled>

                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan harga Buku" name="harga" min="1" value="{{$buku->harga}}" required disabled>

                            <label>Stok</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan Stok Buku" name="stok" min="1" value="{{$buku->stok}}" required disabled>

                            <div class="form-group">
                                <label> Image Buku </label>
                                <img class="mb-3" src="{{ asset('images/buku/' . $buku->image) }}" width="100px">
                                <input type="file" class="form-control mb-3" name="image" required disabled>
                            </div>

                            <label>Nama Penerbit</label>
                            <select class="form-control mb-3" name="id_penerbit" required disabled>
                                @foreach($penerbit as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $buku->id_penerbit ? 'selected' : '' }}>{{ $data->nama_penerbit }}</option>
                                @endforeach
                            </select>

                            <label>Tanggal terbit </label>
                            <input type="date" class="form-control mb-3" placeholder="Masukkan tanggal terbit buku" name="tanggal_terbit" value="{{$buku->tanggal_terbit}}" required disabled>

                            <label>Genre Buku</label>
                            <select class="form-control mb-3" name="id_genre" required disabled>
                                @foreach($genre as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $buku->id_genre ? 'selected' : '' }}>{{ $data->genre }}</option>
                                @endforeach
                            </select>

                        </div>
                        <a href="{{ route('buku.index') }}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
