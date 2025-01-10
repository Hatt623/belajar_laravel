@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tampilan Data Siswa') }}</div>

                <div class="card-body">
                    <form action="{{ route('siswa.update' , $siswa->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" class="form-control mb-3" placeholder="NIS Siswa" name="nis" value="{{ $siswa->nis }}" disabled>

                            <label>Nama</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Siswa" name="nama" value="{{ $siswa->nama }}" disabled>

                            <label>Jenis Kelamin</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }} " disabled> {{ $siswa->jenis_kelamin }}  
                            <br>

                            <label class="">Kelas</label>
                            <select class="form-control mb-3" name="kelas" disabled>
                                <option value="{{ $siswa->kelas }}" > {{$siswa->kelas}}</option>
                                <option value="XI RPL 1">XI RPL 1</option>
                                <option value="XI RPL 2">XI RPL 2</option>
                                <option value="XI RPL 3">XI RPL 3</option>
                            </select>
                        </div>
            
                        <a href="{{ route('siswa.index') }}" class="btn btn-primary">Back</a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
