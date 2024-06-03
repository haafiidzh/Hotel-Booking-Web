{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data kependudukan</title>
</head>
<body > --}}
@extends('template')
@section('content')

    <body>
        <div class="page-heading">
            &nbsp;
        </div>
        <h1 class="judul"><strong>Detail Customer</strong></h1>

        <div>
            <div class="back">
                <a href="/customer" class="btn btn-info my-3">
                    <i class="fas fa-arrow-left"></i><span>&nbsp;&nbsp;KEMBALI</span></a>
            </div>
        </div>
        @foreach ($data as $customer)
            <div>
                <form>
                    {{-- action="/kependudukan/edit" method="post">
            {{ csrf_field() }} --}}
                    <table>
                        <tr>
                            <td><strong>ID Customer</strong></td>
                            <td>:</td>
                            <td>{{ $customer->id_cust }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>:</td>
                            <td>{{ $customer->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>:</td>
                            <td>{{ $customer->alamat }}</td>
                        </tr>
                        <tr>
                            <td><strong>No. Telepon</strong></td>
                            <td>:</td>
                            <td>{{ $customer->no_telp }}</td>
                        </tr>

                    </table>
                </form>

                <figure>
                    <img src="{{ asset('admin/dist/img/foto-daftar-removebg.png') }}" alt="Kependudukan">
                </figure>

            </div>
        @endforeach

    </body>
@endsection
{{-- </body>
    </html> --}}
