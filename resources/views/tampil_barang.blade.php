<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($barang as $data)
        <p> <b>ID barang :</b> {{$data->id}}</p>
        <p> <b>Nama Barang barang :</b> {{$data->nama_barang}}</p>
        <p> <b>Merek barang :</b> {{$data->merek}}</p>
        <p> <b>Harga barang :</b> {{number_format($data->harga)}}</p>
        


        <hr>
    @endforeach
    
</body>
</html>