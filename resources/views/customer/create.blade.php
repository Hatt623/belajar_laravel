@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Customer') }}</div>

                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">  
                        <!-- ini diperlukan atau akan Expire pagenya @csrf -->
                        @csrf 
                        <div class="form-group">
                            <label>Name </label>
                            <input type="text" class="form-control mb-3" placeholder="Insert customer name" name="name_customer" required>

                            <label>Gender</label> <br>
                            <input type="radio" class="form-check-input mb-3" name="gender" value="Man" required> Man 
                            <input type="radio" class="form-check-input mb-3" name="gender" value="Woman" required> Woman 
                            <br>

                            <label>Contact</label>
                            <input type="number" class="form-control mb-3" placeholder="Insert phone number" name="contact" min="1" required>

                        </div>
                        <button type="submit" class="btn btn-primary" name="save" >save</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
