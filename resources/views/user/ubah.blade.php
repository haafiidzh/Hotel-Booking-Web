@extends('template')
@section('content')

    <body>
        <h1 class="judul"><strong>Edit Akun</strong></h1>
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
                <a href="/user" class="btn btn-info my-3">
                    <i class="fas fa-arrow-left"></i><span>&nbsp;&nbsp;KEMBALI</span></a>
            </div>
        </div>
        <div class="container-table">
            <div>
                @foreach ($data as $user)
                    <form action="/user/edit" method="post">
                        {{ csrf_field() }}
                        <table>

                            <tr>
                                <td><strong>ID</strong></td>
                                <td>:</td>
                                <td><input type="text" name="id" placeholder="ID (otomatis)" value="{{ $user->id }}"
                                        readonly></td>
                            </tr>
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>:</td>
                                <td><input type="text" name="name" required="required" placeholder="Masukkan Nama"
                                        value="{{ $user->name }}"></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>:</td>
                                <td><input type="text" name="email" required="required" placeholder="Masukkan Email"
                                        value="{{ $user->email }}"></td>
                            </tr>
                            <tr>
                                <td><strong>Password</strong></td>
                                <td>:</td>
                                <td><input type="text" name="password" required="required"
                                        placeholder="Masukkan Password"value="{{ $user->password }}">
                                </td>
                            </tr>
                            {{-- <tr>
                                    <td><strong>Masukkan Ulang Password</strong></td>
                                    <td>:</td>
                                    <td><input type="text" name="password" required="required" placeholder="Masukkan Password">
                                    </td>
                                </tr> --}}
                            <tr>
                                <td><strong>Role</strong></td>
                                <td>:</td>
                                <td>
                                    <select class="form-control js-choice" name="role" required
                                        value="{{ $user->role }}">
                                        <option selected>--PILIH ROLE--</option>
                                        <option value="Resepsionis">Resepsionis</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Owner">Owner</option>
                                    </select>
                                </td>
                            </tr>


                        </table>
                        <input class="submit btn btn-success" type="submit" value="SIMPAN DATA">
                    </form>
                @endforeach

                <figure>
                    <img src="{{ asset('admin/dist/img/uas/edit-akun.png') }}" class="edit-akun" >
                </figure>
            </div>
    </body>
@endsection
