@extends('layouts.app')

@section('content')
<div class="container">     
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Buku') }}</div>

                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">  
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

                            <label>Nama Buku</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama Buku" name="nama_buku" value="{{ old('nama_buku') }}" required>

                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan harga Buku" name="harga" min="1" value="{{ old('harga') }}" required>

                            <label>Stok</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan Stok Buku" name="stok" min="1" value="{{ old('stok') }}" required>

                            <div class="form-group">
                                <label> Image Buku </label>
                                <input type="file" class="form-control mb-3" name="image" value="{{ old('image') }}" required>
                            </div>

                            <label>Nama Penerbit</label>
                            <select class="form-control mb-3" name="id_penerbit">
                                @foreach($penerbit as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_penerbit }}</option>
                                @endforeach
                            </select>

                            <label>Tanggal terbit </label>
                            <input type="date" class="form-control mb-3" placeholder="Masukkan tanggal terbit buku" name="tanggal_terbit" value="{{ old('tanggal_penerbit') }}" required>

                            <label>Genre Buku</label>
                            <select class="form-control mb-3" name="id_genre">
                                @foreach($genre as $data)
                                    <option value="{{ $data->id }}"> {{ $data->genre }}</option>
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
