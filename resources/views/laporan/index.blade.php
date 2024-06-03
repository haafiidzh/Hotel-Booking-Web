@extends('template')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laporan</title>
    </head>

    <body>
        <main class="home">
            <h1 class="judul"><strong>Laporan</strong></h1>
            
            <button>
                <a href="/laporan/cetak_customer_pdf">customer</a>
            </button>
            <button>
                <a href="/laporan/cetak_transaksi_pdf">transaksi</a>
            </button>
        </main>
    </body>

    </html>
@endsection
