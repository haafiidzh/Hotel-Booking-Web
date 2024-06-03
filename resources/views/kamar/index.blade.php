@extends('template')
@section('content')

    <body>
        <div class="page-heading">
            &nbsp;
        </div>
        <h1 class="judul"><strong>Kamar</strong></h1>

        <nav class="navigasi">
            {{-- <div>
                <a href="//tambah" class="btn btn-info my-3"><i class="fa fa-user-plus"></i>&ensp;INPUT BARU</a>
            </div> --}}
        </nav>


        <main class="kamar-list">
            @foreach ($data as $kamar)
                <div class="kamar">
                    <div>
                        <h1><strong>Rp.{{ $kamar->harga }}</strong></h1>
                        &nbsp;
                        <h3>{{ $kamar->tipe }}</h3>
                    </div>
                </div>
            @endforeach
        </main>





    </body>
@endsection
