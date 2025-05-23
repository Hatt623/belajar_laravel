@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Transaksi') }}</div>

                <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif

                    <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-2" style="float:right; align:right;">Add</a>
                <table class="table border-primary-subtle  table-striped">
                    <thead>
                        <tr class="table-primary ">
                            <th scope="col">No</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal transaksi</th>
                            <th scope="col">id_buku</th>
                            <th scope="col">id_pembeli</th>
                            <th scope="col">Action</th>                       
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp 
                        @foreach ($transaksi as $data)
                        <tr>
                        <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->tanggal_transaksi }}</td>
                            <td>{{ $data->buku->nama_buku }}</td>
                            <td>{{ $data->pembeli->nama_pembeli }}</td>

                            <td>
                            <a href=" {{ route('transaksi.edit' , $data->id) }} " class="btn btn-success">Edit</a>
                            <a href=" {{ route('transaksi.show' , $data->id) }}" class="btn btn-warning">Show</a>

                            <form action="{{ route('transaksi.destroy', $data->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin inging menghapus?')" >Delete</button>
                            </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection