<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use PDF;

class CustomerController extends Controller
{
    // public function generateCustID() //fungsi untuk generate id yang auto increment sesuai template
    // {
    //     $lastID = Cache::get('last_cust_id', 0);
    //     $newID = $lastID + 1;

    //     // Format ID dengan template 'CST001'
    //     $formattedID = 'CST' . str_pad($newID, 3, '0', STR_PAD_LEFT);

    //     Cache::put('last_cust_id', $newID);

    //     return $formattedID;
    // }

    public function tampil ()
    {
        $data=Customer::All();
        return view ('customer.index', ['data'=>$data]);
    }

    public function tambah()
    {
        $cstterakhir = Customer::orderBy('id_cust', 'desc')->first();

        if ($cstterakhir) {
            $lastId = substr($cstterakhir->id_cust, 3); // Mengambil angka setelah 'CST'
            $newId = 'CST' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Menambahkan 1 dan format ID baru
        } else {
            $newId = 'CST001'; // Jika tidak ada data sebelumnya, maka ID pertama adalah 'KST001'
        }

        return view('customer.tambah', ['newId'=>$newId]);
    }

    public function simpan(Request $request)
    {
        $data = array(
            "id_cust" => $request->id_cust,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_telp" => $request->no_telp
        );

        // $data['id_cust'] = $this->generateCustID(); // Menggunakan $this untuk memanggil method dalam class

        $customer = Customer::create($data);
        if ($customer) {
            return redirect('/customer')->with(['status' => true, 'message' => 'Berhasil Tambah Data']);
        } else {
            return redirect('/customer')->with(['status' => false, 'message' => 'Gagal Tambah Data']);
        }
    }

    public function ubah($id_cust){
        $data=Customer::where('id_cust',$id_cust)->get();
        return view('customer.ubah',['data'=>$data]);
    }

    public function lihat($id_cust){
        $data=Customer::where('id_cust',$id_cust)->get();
        return view('customer.lihat',['data'=>$data]);
    }

    public function edit(request $request)
    {
        $data=Customer::where("id_cust",$request->id_cust)->update(array(
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_telp" => $request->no_telp
        ));

        if($data){
            return redirect('/customer')->with(array('status'=>true,'Berhasil Ubah Data'));  
        } else{
            return json_encode(array('status'=>false,'pesan'=>"Gagal Ubah Data"));
        }
    }

    public function hapus($id_cust)
    {
        $data = Customer::where("id_cust", $id_cust)->delete();

        if($data){
            return redirect('/customer')->with(array('status=true','Berhasil Hapus Data'));           
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }

    public function cetak_customer_pdf()
    {
        $customer = Customer::all();

        $pdf = PDF::loadview('laporan.customer-pdf',['customer'=>$customer]);
        return $pdf->download('laporan-customer.pdf');
    }
    
}
