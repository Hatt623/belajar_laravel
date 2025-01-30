@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tampilan Data pembelian') }}</div>

                <div class="card-body">
                    <form action="{{ route('pembelian.update' , $pembeli->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama pembeli" name="nama_pembeli" value="{{ $pembeli->nama_pembeli }}" required disabled>

                            <label>Jenis Kelamin</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="{{ $pembeli->jenis_kelamin }}" required checked disabled> {{ $pembeli->jenis_kelamin }} (Pilihan terakhir)  
                            <br>

                            <label>Telepon</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan Nama pembeli" name="telepon" value="{{ $pembeli->telepon }}" required disabled> 
 
                        </div>
                        <a href="{{ route('pembelian.index') }}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
