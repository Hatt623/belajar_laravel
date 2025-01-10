@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data PPDB') }}</div>

                <div class="card-body">
                    <form action="{{ route('ppdb.update' , $ppdb->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama lengkap</label>
                            <input type="text" class="form-control mb-3" placeholder="Silahkan update nama anda" name="nama_lengkap" value="{{ $ppdb->nama_lengkap }}" required>


                            <label>Jenis Kelamin</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="{{ $ppdb->jenis_kelamin }}" checked="checked" required> {{ $ppdb->jenis_kelamin }} (Jenis kelamin yang anda pilih)
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki 
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="Perempuan" required> perempuan 
                            <br>

                            <label class="">Agama</label>
                            <select class="form-control mb-3" name="agama" required>
                                <option value="{{ $ppdb->agama }}" > {{$ppdb->agama}} (agama yang anda pilih)</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Buddha">Buddha</option>
                            </select>

                            <label>Alamat</label>
                            <textarea class="form-control mb-3" placeholder="silahkan update alamat anda..." name="alamat" value="{{ $ppdb->alamat }}" required> {{$ppdb->alamat}} </textarea>

                            <label>Telpon</label>
                            <input type="number" class="form-control mb-3" placeholder="silahkan update nomor telpon yang aktif..." name="telpon" min="0" value="{{ $ppdb->telpon }}" required>

                            <label>Asal Sekolah</label>
                            <input type="text" class="form-control mb-3" placeholder="silahkan update asal sekolah anda..." name="asal_sekolah" value="{{ $ppdb->asal_sekolah }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >Update</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
