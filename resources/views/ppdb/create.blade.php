@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data PPDB') }}</div>

                <div class="card-body">
                    <form action="{{ route('ppdb.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama Lengkap Anda..." name="nama_lengkap" required>
 
                            <label>Jenis Kelamin</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki 
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="perempuan" required> perempuan 
                            <br>


                            <label class="">Agama</label>
                            <select class="form-control mb-3" name="agama" required>
                                <option value="" selected disabled hidden >Pilihlah Agama Anda</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Buddha">Buddha</option>
                            </select>

                            <label>Alamat</label>
                            <textarea class="form-control mb-3" placeholder="Masukkan alamat anda..." name="alamat" required></textarea>

                            <label>Telpon</label>
                            <input type="number" class="form-control mb-3" placeholder="Mohon masukkan nomor telpon yang aktif..." name="telpon" min="0" required>

                            <label>Asal Sekolah</label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Nama asal sekolah anda..." name="asal_sekolah" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
