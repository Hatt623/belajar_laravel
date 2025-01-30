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
                        <div class="form-group">

                            <label>Jumlah</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan jumlah buku" name="jumlah" value="{{ $transaksi->jumlah }}" min="1" required disabled>

                            <label>Tanggal Transaksi </label>
                            <input type="date" class="form-control mb-3" placeholder="Masukkan tanggal transaksi" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}" required disabled>

                            <label>Nama Buku</label>
                            <select class="form-control mb-3" name="id_buku" required disabled>
                                @foreach($buku as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_buku ? 'selected' : '' }}>{{ $data->nama_buku }}</option>
                                @endforeach
                            </select>

                            <label>Nama Pembeli</label>
                            <select class="form-control mb-3" name="id_pembeli" rquired disabled>
                                @foreach($pembeli as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_pembeli ? 'selected' : '' }}>{{ $data->nama_pembeli }}</option>
                                @endforeach
                            </select>

                        </div>
                        <a href="{{route('transaksi.index')}}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
