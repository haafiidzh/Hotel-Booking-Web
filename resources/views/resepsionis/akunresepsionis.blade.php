@extends('template')
@section('content')

    <body>
        <div class="page-heading">
            &nbsp;
        </div>
        <h1 class="judul"><strong>Resepsionis</strong></h1>
        <nav class="navigasi">

        </nav>
        <div class="container-table">
            <table class="tabel-data" {{-- class="table-hovertable-striped" --}}>
                <tr>
                    {{-- <th>ID Akun</th> --}}
                    <th>No. </th>
                    <th>Nama</th>
                    <th>E-mail</th>
                    <th>Role</th>
                </tr>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $d)
                        <tr>
                            {{-- <td>{{$d->id }}</td> --}}
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->role }}</td>
                </tbody>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
@endsection
