@extends('template')
@section('content')
    <div class="page-heading">
        &nbsp;
    </div>
    <div class="page-content">
        <h1 class="judul"><strong>Transaksi</strong></h1>

        <nav class="navigasi">
            {{-- <div>
                <a href="/customer/tambah" class="btn btn-info my-3"><i class="fa fa-user-plus"></i>&ensp;INPUT BARU</a>
            </div> --}}
            @can('Owner')
            <div class="cetak">
                <a href="/laporan/cetak_transaksi_pdf" target="_blank" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i>&ensp;CETAK PDF</a>
                {{-- <a href="/kependudukan/export_excel" target="_blank" class="btn btn-success my-3 fas"><i class="fa fa-file-excel"></i>&ensp;EXPORT EXCEL</a> --}}
            </div>
            @endcan
        </nav>
        <div class="container-table">
            <table class="tabel-data" {{-- class="table-hovertable-striped" --}}>
                <tr>
                    <th>No.</th>
                    <th>ID Transaksi</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Tipe</th>
                    <th>Check IN</th>
                    <th>Check OUT</th>
                    <th>Total Transaksi</th>
                </tr>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $d)
                        <tr class="data-hover">
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->id_transaksi }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->no_telp }}</td>
                            <td>{{ $d->tipe }}</td>
                            <td>{{ $d->checkin }}</td>
                            <td>{{ $d->checkout }}</td>
                            <td>Rp. {{ $d->total }}</td>
                </tbody>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
