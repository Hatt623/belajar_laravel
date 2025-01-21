@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Kategori') }}</div>

                <div class="card-body">
                    <form action="{{ route('kategori.update' , $kategori->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Silahkan update nama kategori benda" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                            
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >Update</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
