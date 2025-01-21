@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Telepon') }}</div>

                <div class="card-body">
                    <form action="{{ route('telepon.update' , $telepon->id) }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" class="form-control mb-3" placeholder="Sialhkan update nomor telepon anda" name="nomor" value="{{ $telepon->nomor }}">

                            <label class="">Kelas</label>
                            <select class="form-control mb-3" name="id_pengguna">
                                @foreach($pengguna as $data)
                                    <option value="{{ $data->id }}" {{ $data->id == $telepon->id_pengguna ? 'selected' : ''}}> {{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >Update</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
