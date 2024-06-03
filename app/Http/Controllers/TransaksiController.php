<?php

namespace App\Http\Controllers;
use App\Models\ViewTransaksi;
use App\Models\Transaksi;
use App\Models\Kamar;
use App\Models\Customer;
use Carbon\Carbon;
use PDF;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function tampil ()
    {
        $data=ViewTransaksi::All();
        return view ('transaksi.index', ['data'=>$data]);
    }

    public function tambah()
    {
        $trxterakhir = Transaksi::orderBy('id_transaksi', 'desc')->first();

        if ($trxterakhir) {
            $lastId = substr($trxterakhir->id_transaksi, 3); // Mengambil angka setelah 'TRX'
            $newId = 'TRX' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format ID baru
        } else {
            $newId = 'TRX001'; // Jika tidak ada data sebelumnya, maka ID pertama adalah 'KST001'
        }

        return view('transaksi.tambah', ['newId'=>$newId,'kamar'=>Kamar::all(),'customer'=>Customer::all()]);
    }

    public function simpan(Request $request)
    {
        $data = array(
            "id_transaksi" => $request->id_transaksi,
            "id_cust" => $request->id_cust,
            "id_kamar" => $request->id_kamar,
            "checkin" => $request->checkin,
            "checkout" => $request->checkout,
            "total" => $request->total,
        );

        $transaksi = Transaksi::create($data);
        if ($transaksi) {
            return redirect('/transaksi')->with(['status' => true, 'message' => 'Berhasil Tambah Data']);
        } else {
            return redirect('/transaksi')->with(['status' => false, 'message' => 'Gagal Tambah Data']);
        }
    }

    public function hapus($id_transaksi)
    {
        $data = Transaksi::where("id_transaksi", $id_transaksi)->delete();

        if($data){
            return redirect('/transaksi')->with(array('status=true','Berhasil Hapus Data'));           
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }

    public function getCustInfo($id_cust)
    {
        $customer = Customer::where('id_cust', $id_cust)->first();

        if ($customer) {
            return response()->json([
                'nama' => $customer->nama,
                'no_telp' => $customer->no_telp
            ]);
        } else {
            return response()->json(['error' => 'Customer not found'], 404);
        }
    }

    public function getKamarInfo($id_kamar)
    {
        $kamar = Kamar::where('id_kamar', $id_kamar)->first();

        if ($kamar) {
            return response()->json([
                'tipe' => $kamar->tipe,
                'harga' => $kamar->harga
            ]);
        } else {
            return response()->json(['error' => 'Customer not found'], 404);
        }
    }

    public function cetak_transaksi_pdf()
    {
        $transaksi = ViewTransaksi::all();

        $pdf = PDF::loadview('laporan.transaksi-pdf',['transaksi'=>$transaksi]);
        return $pdf->download('laporan-transaksi.pdf');
    }
}
