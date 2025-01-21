@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Telepon') }}</div>

                <div class="card-body">
                    <form action="{{ route('telepon.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nomor Telepon Anda..." name="nomor" required>
 
                            <label class="">Nama Pengguna</label>
                            <select class="form-control mb-3" name="id_pengguna">
                                @foreach($pengguna as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
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
