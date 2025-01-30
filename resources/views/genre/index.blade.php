@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Genre') }}</div>

                <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif

                    <a href="{{ route('genre.create') }}" class="btn btn-success" style="float:right; align:right;">Add</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama genre</th>
                            <th scope="col">Action</th> 
                            


                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp 
                        @foreach ($genre as $data)
                        <tr>
                        <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->genre }}</td>
                            <td>
                            <a href=" {{ route('genre.edit' , $data->id) }} " class="btn btn-success">Edit</a>
                            <a href=" {{ route('genre.show' , $data->id) }}" class="btn btn-warning">Show</a>

                            <form action="{{ route('genre.destroy', $data->id) }}" method="post" style="display:inline;">
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
