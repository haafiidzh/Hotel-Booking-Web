<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
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
        <h6>DATA TRANSAKSI </h5>
    </center>
    <table class='table table-bordered'>
    <thead>
    <tr>
    <th>ID Transaksi</th>
    <th>Nama</th>
    <th>No. Telepon</th>
    <th>Tipe Kamar</th>
    <th>Check IN</th>
    <th>Check OUT</th>
    <th>Total</th>
    </tr> 
    </thead>
    <tbody>
    @foreach($transaksi as $p)
    <tr>
    <td>{{$p->id_transaksi}}</td>
    <td>{{$p->nama}}</td>
    <td>{{$p->no_telp }}</td>
    <td>{{$p->tipe}}</td> 
    <td>{{$p->checkin}}</td>
    <td>{{$p->checkout}}</td>
    <td>{{$p->total}}</td>
    </tr>
@endforeach
</tbody>
</table>

</body>
</html>
    