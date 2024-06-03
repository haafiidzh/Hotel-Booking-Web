@extends('template')
@section('content')

    <body>
        <main class="home">
            <div class="jumbotron-home">
                <h3>Melayani Anda dengan senyuman.</h3>
                <ul>
                    @can('Admin')
                    <a href="/user">AKUN</a>
                    <a href="/kamar">KAMAR</a>
                    <a href="/transaksi">TRANSAKSI</a>
                    @endcan

                    @can('Resepsionis')
                    <a href="/akun/resepsionis">AKUN</a>
                    <a href="/customer">GUEST</a>
                    <a href="/transaksi">TRANSAKSI</a>    
                    @endcan

                    @can('Owner')
                    <a href="/user">AKUN</a>
                    <a href="/laporan">LAPORAN</a>
                    @endcan
                    
                </ul>
            </div>
        </main>
    </body>
@endsection
