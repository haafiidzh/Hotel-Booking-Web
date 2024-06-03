<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function tampil()
    {
        $data = Kamar::All();
        return view('kamar.index', ['data' => $data]);
    }

    public function tambah()
    {
        
        $kamarLast = Kamar::orderBy('id_kamar', 'desc')->first();
        $idKamarLast = $kamarLast ? $kamarLast->id_kamar : 0;
        $idKamarNext = $idKamarLast + 1;

        return view('kamar.tambah',['idKamarNext'=>$idKamarNext]);
    }

    public function simpan(Request $request)
    {
        $data = array(
            "id_kamar" => $request->id_kamar,
            "tipe" => $request->tipe,
            "harga" => $request->harga,
        );

        $kamar = Kamar::create($data);
        if ($kamar) {
            return redirect('/kamar')->with(['status' => true, 'message' => 'Berhasil Tambah Data']);
        } else {
            return redirect('/kamar')->with(['status' => false, 'message' => 'Gagal Tambah Data']);
        }
    }

    public function ubah($id_kamar)
    {
        $data = Kamar::where('id_kamar', $id_kamar)->get();
        return view('kamar.ubah', ['data' => $data]);
    }

    public function edit(request $request)
    {
        $data = Kamar::where("id_kamar", $request->id_kamar)->update(array(
            "tipe" => $request->tipe,
            "harga" => $request->harga,
        ));

        if ($data) {
            return redirect('/customer')->with(array('status' => true, 'Berhasil Ubah Data'));
        } else {
            return json_encode(array('status' => false, 'pesan' => "Gagal Ubah Data"));
        }
    }

    public function hapus($id_kamar)
    {
        $data = Kamar::where("id_kamar", $id_kamar)->delete();

        if ($data) {
            return redirect('/kamar')->with(array('status=true', 'Berhasil Hapus Data'));
        } else {
            return json_encode(array(
                'status' => false,
                'pesan' => "Gagal Hapus",
            ));
        }
    }
}
