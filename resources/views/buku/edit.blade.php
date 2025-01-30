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

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        <div class="form-group">

                            <label>Nama Buku</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama Buku" name="nama_buku" value="{{$buku->nama_buku}}" required>

                            <label>Harga</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan harga Buku" name="harga" min="1" value="{{$buku->harga}}" required>

                            <label>Stok</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan Stok Buku" name="stok" min="1" value="{{$buku->stok}}" required>

                            <div class="form-group">
                                <label> Image Buku </label>
                                <img class="mb-3" src="{{ asset('images/buku/' . $buku->image) }}" width="100px">
                                <input type="file" class="form-control mb-3" name="image" required>
                            </div>

                            <label>Nama Penerbit</label>
                            <select class="form-control mb-3" name="id_penerbit" required>
                                @foreach($penerbit as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $buku->id_penerbit ? 'selected' : '' }}>{{ $data->nama_penerbit }}</option>
                                @endforeach
                            </select>

                            <label>Tanggal terbit </label>
                            <input type="date" class="form-control mb-3" placeholder="Masukkan tanggal terbit buku" name="tanggal_terbit" value="{{$buku->tanggal_terbit}}" required>

                            <label>Genre Buku</label>
                            <select class="form-control mb-3" name="id_genre" required>
                                @foreach($genre as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $buku->id_genre ? 'selected' : '' }}>{{ $data->genre }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >Update</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
