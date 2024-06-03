@extends('template')
@section('content')
    <body>
        <div class="page-heading">
            &nbsp;
        </div>
        <h1 class="judul"><strong>TAMBAH KAMAR</strong></h1>
        <div>
            <div class="back">
                <a href="/kamar" class="btn btn-info my-3">
                    <i class="fas fa-arrow-left"></i><span>&nbsp;&nbsp;KEMBALI</span></a>
            </div>
        </div>
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
        <div class="container-table">
            <div>
                <form action="/kamar/store" method="post">
                    {{ csrf_field() }}
                    <table>
                        <tr>
                            <td><strong>ID Kamar</strong></td>
                            <td>:</td>
                            <td><input type="text" name="id_kamar" required="required" placeholder="ID (otomatis)" value="{{ $idKamarNext }}" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Tipe</strong></td>
                            <td>:</td>
                            <td><input type="text" name="tipe" required="required" placeholder="Masukkan Tipe"></td>
                        </tr>
                        <tr>
                            <td><strong>Harga/ Malam</strong></td>
                            <td>:</td>
                            <td><input type="text" name="harga" required="required" placeholder="Masukkan Harga"></td>
                        </tr>
                        
                    </table>
                    <input class="submit btn btn-success" type="submit" value="SIMPAN DATA">
                </form>
        </div>
    </body>
@endsection