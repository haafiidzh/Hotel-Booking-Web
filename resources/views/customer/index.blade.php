@extends('template')
@section('content')

    <body>
        <div class="page-heading">
            &nbsp;
        </div>
        <h1 class="judul"><strong>Daftar Tamu</strong></h1>

        <nav class="navigasi">
            {{-- <div>
                <a href="/customer/tambah" class="btn btn-info my-3"><i class="fa fa-user-plus"></i>&ensp;INPUT BARU</a>
            </div> --}}
            @can('Owner')
            <div class="cetak">
                <a href="/laporan/cetak_customer_pdf" target="_blank" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i>&ensp;CETAK PDF</a>
                {{-- <a href="/kependudukan/export_excel" target="_blank" class="btn btn-success my-3 fas"><i class="fa fa-file-excel"></i>&ensp;EXPORT EXCEL</a> --}}
            </div>
            @endcan
        </nav>
        <div class="container-table">
            <table class="tabel-data" {{-- class="table-hovertable-striped" --}}>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    @can('Resepsionis')
                    <th>Opsi</th>
                    @endcan
                </tr>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $customer)
                        <tr class="data-hover">
                            <td>{{ $no++ }}</td>
                            <td>{{ $customer->id_cust }}</td>
                            <td>{{ $customer->nama }}</td>
                            <td>{{ $customer->alamat }}</td>
                            <td>{{ $customer->no_telp }}</td>

                            @can('Resepsionis')
                                <td>
                                    <div class="opsi">
                                        {{-- <a class="btn btn-info" href='/customer/lihat/{{ $akun->id }}'><i class="fas fa-info"></i>Detail</a> --}}
                                        <a class="btn btn-warning" href='/customer/ubah/{{ $customer->id_cust }}'><i
                                                class="fas fa-eye-dropper"></i>Edit</a>

                                        {{-- @if ($customer->id_cust == Auth::id())
                                            <p></p>
                                        @else
                                            @method('delete')
                                            {{ csrf_field() }}
                                            <a class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini?')"
                                                href="/hapus/{{ $customer->id_cust }}"><i class="fa fa-trash"></i>Hapus</a>
                                        @endif --}}
                                    </div>
                                </td>
                            @endcan
                </tbody>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
@endsection
