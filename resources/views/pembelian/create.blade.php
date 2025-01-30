@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data pembelian') }}</div>

                <div class="card-body">
                    <form action="{{ route('pembelian.store') }}" method="post" enctype="multipart/form-data">  
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
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama pembeli" name="nama_pembeli" value="{{ old('nama_pembeli') }}" required>

                            <label>Jenis Kelamin</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki 
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="perempuan" required> perempuan 
                            <br>

                            <label>Telepon</label>
                            <input type="number" class="form-control mb-3" placeholder="Masukkan Nama pembeli" name="telepon" value="{{ old('telepon') }}" required>
 
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
