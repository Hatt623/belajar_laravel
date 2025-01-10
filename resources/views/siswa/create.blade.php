@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Siswa') }}</div>

                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" class="form-control mb-3" placeholder="NIS Siswa" name="nis">

                            <label>Nama</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Siswa" name="nama"> 

                            <label>Jenis Kelamin</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki 
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="perempuan"> perempuan 
                            <br>

                            <label class="">Kelas</label>
                            <select class="form-control mb-3" name="kelas">
                                <option value="" selected disabled hidden >Pilih Kelas</option>
                                <option value="XI RPL 1">XI RPL 1</option>
                                <option value="XI RPL 2">XI RPL 2</option>
                                <option value="XI RPL 3">XI RPL 3</option>
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
