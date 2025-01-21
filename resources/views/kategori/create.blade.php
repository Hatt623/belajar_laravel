@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Kategori') }}</div>

                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan nama kategori benda" name="nama_kategori" required>
 
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
