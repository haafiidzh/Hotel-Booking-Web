<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity=" sha384-ggoyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcwr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
    <style type="text/css">
    table tr td, table tr th{
        font-size: 9pt;
        border-color: #000;
        border-style: groove
    }
    </style>
    <center> 
        <h5> LAPORAN </h4><br>
        <h6>DATA CUSTOMER </h5>
    </center>
    <table class='table table-bordered'>
    <thead>
    <tr>
        <th>ID Customer</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
    </tr> 
    </thead>
    <tbody>
    @foreach($customer as $p)
    <tr>
    <td>{{$p->id_cust}}</td>
    <td>{{$p->nama}}</td>
    <td>{{ $p->alamat }}</td>
    <td>{{$p->no_telp}}</td>
    </tr>
@endforeach
</tbody>
</table>

</body>
</html>
    