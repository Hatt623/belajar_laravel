<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('admin/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ asset('admin/css/timeline.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('admin/css/startmin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset('admin/css/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js'"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js'"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- NAVBAR -->
                @include('layouts.part.navbar')
            <!-- /.navbar-top-links -->

            <!-- NAVBAR -->

            <!-- Sidebar -->
                @include('layouts.part.sidebar')
            <!-- /.sidebar -->

            <!-- Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">produk</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- /.row -->
                    <div class="col-lg-12">
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data" role="form">
                        @csrf 

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama_produk" required>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" placeholder="Harga Produk" name="harga" min="1" required>
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" class="form-control" placeholder="Stok" name="stok" min="0" required>
                            </div>

                            <div class="form-group">
                                <label class="">Nama kategori</label>
                                <select class="form-control mb-3" name="id_kategori">
                                    @foreach($kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Cover</label>
                                <input type="file" class="form-control mb-3" name="cover" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="save" >Save</button>

                        </form>
                    </div>

                        
                    <!-- /.row -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- Content -->
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{ asset('admin/js/raphael.min.js') }}"></script>
        <script src="{{ asset('admin/js/morris.min.js') }}"></script>
        <script src="{{ asset('admin/js/morris-data.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('admin/js/startmin.js') }}"></script>

    </body>

</html>
