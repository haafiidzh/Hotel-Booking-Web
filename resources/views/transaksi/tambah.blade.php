@extends('template')
@section('content')
    <div class="page-heading">
        &nbsp;
    </div>
    <h1 class="judul"><strong>Tambah Transaksi</strong></h1>
    <!-- {{-- 
        <nav class="navigasi">
            <div>
                <a href="/tambah" class="btn btn-info my-3"><i class="fa fa-user-plus"></i>&ensp;INPUT BARU</a>
            </div>
            <div class="cetak">
                <a href="/kependudukan/cetak_pdf" target="_blank" class="btn btn-danger my-3"><i class="fas fa-file-pdf"></i>&ensp;CETAK PDF</a>
                <a href="/kependudukan/export_excel" target="_blank" class="btn btn-success my-3 fas"><i class="fa fa-file-excel"></i>&ensp;EXPORT EXCEL</a>
            </div>
        </nav> --}} -->
        <div class="atas-transaksi">
            <div class="back-transaksi">
                <a href="/transaksi" class="btn btn-info">
                    <i class="fas fa-arrow-left"></i><span>&nbsp;&nbsp;KEMBALI</span></a>
            </div>
            <div class="id-transaksi">
                <table>
                    <tr>
                        <td><strong>ID Transaksi</strong></td>
                        <td>:</td>
                        <td><input type="text" name="id_transaksi" required="required" placeholder="ID (otomatis)"
                                value="{{ $newId }}" readonly></td>
                    </tr>
                </table>
            </div>
        </div>
    <div class="container-table">
        <div>
            <form action="/transaksi/store" method="post">
                {{ csrf_field() }}
                <table>
                    <tr hidden>
                        <td><strong>ID TRANSAKSI</strong></td>
                        <td>:</td>
                        <td><input type="text" name="id_transaksi" required="required" placeholder="ID (otomatis)"
                                value="{{ $newId }}" readonly></td>
                    </tr>
                    <tr>
                        <td><strong>ID Customer</strong></td>
                        <td>:</td>
                        <td>
                            <select class="form-control js-choice" name="id_cust" id="id_cust" required>
                                <option selected>---Pilih ID CUSTOMER---</option>
                                @foreach ($customer as $p)
                                    <option value="{{ $p->id_cust }}" @if (old('id_cust') == $p->id_cust) selected @endif>
                                        {{ $p->id_cust }}</option>
                                @endforeach
                            </select>
                        </td>

                        
                        {{-- kolom 2 --}}
                        <td><strong>ID Kamar</strong></td>
                        <td>:</td>
                        <td>
                            <select class="form-control js-choice" name="id_kamar" id="id_kamar" required>
                                <option selected>---Pilih ID KAMAR---</option>
                                @foreach ($kamar as $p)
                                    <option value="{{ $p->id_kamar }}" @if (old('id_kamar') == $p->id_kamar) selected @endif>
                                        {{ $p->id_kamar }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>:</td>
                        <td><input type="text" name="nama" id="nama" required="required" readonly></td>

                        {{-- kolom2 --}}
                        <td><strong>Tipe</strong></td>
                        <td>:</td>
                        <td><input type="text" name="tipe" id="tipe" required="required" readonly></td>
                    </tr>
                    <tr>
                        <td><strong>No Telepon</strong></td>
                        <td>:</td>
                        <td><input type="text" name="no_telp" id="no_telp" required="required" readonly></td>

                        {{-- kolom 2 --}}
                        <td><strong>Harga/Hari</strong></td>
                        <td>:</td>
                        <td><input type="text" name="harga" id="harga" required="required" readonly></td>
                    </tr>
                    {{-- <tr>
                        <td><strong>ID Kamar</strong></td>
                        <td>:</td>
                        <td>
                            <select class="form-control js-choice" name="id_kamar" id="id_kamar" required>
                                <option selected>---Pilih ID KAMAR---</option>
                                @foreach ($kamar as $p)
                                    <option value="{{ $p->id_kamar }}" @if (old('id_kamar') == $p->id_kamar) selected @endif>
                                        {{ $p->id_kamar }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Tipe</strong></td>
                        <td>:</td>
                        <td><input type="text" name="tipe" id="tipe" required="required" readonly></td>
                    </tr>
                    <tr>
                        <td><strong>Harga/Hari</strong></td>
                        <td>:</td>
                        <td><input type="text" name="harga" id="harga" required="required" readonly></td>
                    </tr> --}}
                    <tr>
                        <td><strong>Check IN</strong></td>
                        <td>:</td>
                        <td>
                            {{-- <input type="datetime-local" class="form-control" name="checkin" required> --}}
                            <input type="date" id="check_in" class="form-control" name="checkin" required>
                        </td>

                        {{-- kolom 2 --}}
                        <td><strong>Lama Menginap</strong></td>
                        <td>:</td>
                        <td>
                            <p id="hari" hidden></p>
                            <input type="text" id="jumlah" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Check OUT</strong></td>
                        <td>:</td>
                        <td>
                            {{-- <input type="datetime-local" class="form-control" name="checkout" required> --}}
                            <input type="date" id="check_out" class="form-control" name="checkout" required
                                onchange="calculateDays()">
                        </td>

                        {{-- kolom 2 --}}
                        <td><strong>Grand Total</strong></td>
                        <td>:</td>
                        <td><input type="text" id="total" name="total" readonly></td>
                    </tr>
                    {{-- <tr>
                        <td><strong>Lama Menginap</strong></td>
                        <td>:</td>
                        <td>
                            <p id="hari" hidden></p>
                            <input type="text" id="jumlah" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Grand Total</strong></td>
                        <td>:</td>
                        <td><input type="text" id="total" name="total" readonly></td>
                    </tr> --}}

                </table>
                <input class="submit btn btn-success" type="submit" value="SIMPAN DATA">
            </form>
        </div>


        <script>
            function calculateDays() {
                var checkIn = new Date(document.getElementById("check_in").value);
                var checkOut = new Date(document.getElementById("check_out").value);

                var perbedaan = checkOut.getTime() - checkIn.getTime();

                var numberOfDays = Math.ceil(perbedaan / (1000 * 3600 * 24));

                var hargaKamar = parseFloat(document.getElementById("harga").value);
                var hari = numberOfDays;
                var totalHarga = hargaKamar * numberOfDays;

                document.getElementById("hari").innerHTML = numberOfDays;

                document.getElementById("jumlah").value = hari;
                document.getElementById("total").value = totalHarga;
            }
        </script>
    @endsection
