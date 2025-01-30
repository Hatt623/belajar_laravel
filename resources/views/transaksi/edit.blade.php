@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Transaksi') }}</div>

                <div class="card-body">
                    <form action="{{ route('transaksi.update' , $transaksi->id) }}" method="post" enctype="multipart/form-data">  
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
                        @endif
                        
                        <div class="form-group">

                            <label>Jumlah</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan jumlah buku" name="jumlah" value="{{ $transaksi->jumlah }}" min="1" required>

                            <label>Tanggal Transaksi </label>
                            <input type="date" class="form-control mb-3" placeholder="Masukkan tanggal transaksi" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}" required>

                            <label>Nama Buku</label>
                            <select class="form-control mb-3" name="id_buku" required>
                                @foreach($buku as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_buku ? 'selected' : '' }}>{{ $data->nama_buku }}</option>
                                @endforeach
                            </select>

                            <label>Nama Pembeli</label>
                            <select class="form-control mb-3" name="id_pembeli" rquired>
                                @foreach($pembeli as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_pembeli ? 'selected' : '' }}>{{ $data->nama_pembeli }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                        <a href="tra"></a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
