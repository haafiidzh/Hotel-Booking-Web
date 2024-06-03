@extends('template')
@section('content')

    <div class="page-heading">
        &nbsp;
    </div>
    <h1 class="judul"><strong>Akun</strong></h1>

    <nav class="navigasi">
        {{-- <div>
            <a href="/customer/tambah" class="btn btn-info my-3"><i class="fa fa-user-plus"></i>&ensp;INPUT BARU</a>
        </div>
        <div class="cetak">
            <a href="/laporan/cetak_customer_pdf" target="_blank" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i>&ensp;CETAK PDF</a>
            <a href="/kependudukan/export_excel" target="_blank" class="btn btn-success my-3 fas"><i class="fa fa-file-excel"></i>&ensp;EXPORT EXCEL</a>
        </div> --}}
    </nav>

    <div class="container-table">
        <table class="tabel-data" {{-- class="table-hovertable-striped" --}}>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                @can('Admin')
                <th>Opsi</th>
                @endcan
            </tr>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $user)
                    <tr class="data-hover">
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>

                        @can('Admin')
                            <td>
                                <div class="opsi">
                                    {{-- <a class="btn btn-info" href='/customer/lihat/{{ $akun->id }}'><i class="fas fa-info"></i>Detail</a> --}}
                                    <a class="btn btn-warning" href='/user/ubah/{{ $user->id }}'><i
                                            class="fas fa-eye-dropper"></i>Edit</a>

                                    @if ($user->id == Auth::id())
                                        <p></p>
                                    @else
                                        @method('delete')
                                        {{ csrf_field() }}
                                        <a class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini?')"
                                            href="/hapus/{{ $user->id }}"><i class="fa fa-trash"></i>Hapus</a>
                                    @endif
                                </div>
                            </td>
                        @endcan
            </tbody>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="page-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection
