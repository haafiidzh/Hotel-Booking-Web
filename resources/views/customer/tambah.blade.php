@extends('template')
@section('content')
    <body>
        <div class="page-heading">
            &nbsp;
        </div>
        <h1 class="judul"><strong>Tambah Customer</strong></h1>
{{-- 
        <nav class="navigasi">
            <div>
                <a href="/tambah" class="btn btn-info my-3"><i class="fa fa-user-plus"></i>&ensp;INPUT BARU</a>
            </div>
            <div class="cetak">
                <a href="/kependudukan/cetak_pdf" target="_blank" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i>&ensp;CETAK PDF</a>
                <a href="/kependudukan/export_excel" target="_blank" class="btn btn-success my-3 fas"><i class="fa fa-file-excel"></i>&ensp;EXPORT EXCEL</a>
            </div>
        </nav> --}}
        <div>
            <div class="back">
                <a href="/customer" class="btn btn-info my-3">
                    <i class="fas fa-arrow-left"></i><span>&nbsp;&nbsp;KEMBALI</span></a>
            </div>
        </div>
        <div class="container-table">
            <div>
                <form action="/customer/store" method="post">
                    {{ csrf_field() }}
                    <table>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td>:</td>
                            <td><input type="text" name="id_cust" required="required" placeholder="ID (otomatis)" value="{{$newId}}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>:</td>
                            <td><input type="text" name="nama" required="required" placeholder="Masukkan Nama"></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>:</td>
                            <td><input type="text" name="alamat" required="required" class="alamat" placeholder="Masukkan Alamat"></td>
                        </tr>
                        <tr>
                            <td><strong>No. Telp</strong></td>
                            <td>:</td>
                            <td><input type="text" name="no_telp" required="required" class="no_telp" placeholder="Masukkan No. Telepon"></td>
                        </tr>
                       
                    </table>
                    <input class="submit btn btn-success" type="submit" value="SIMPAN DATA">
                </form>
        </div>
    </body>
@endsection