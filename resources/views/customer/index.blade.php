@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Customer') }}</div>

                <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif

                    <a href="{{ route('customer.create') }}" class="btn btn-success" style="float:right; align:right;">Add</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Customer name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Contact</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp 
                        @foreach ($customer as $data)
                        <tr>
                        <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->name_customer }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->contact }}</td>
                            <td>
                            <a href=" {{ route('customer.edit' , $data->id) }} " class="btn btn-success">Edit</a>
                            <a href=" {{ route('customer.show' , $data->id) }}" class="btn btn-warning">Show</a>

                            <form action="{{ route('customer.destroy', $data->id) }}" method="post" style="display:inline;">
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
