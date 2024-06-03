<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AkunController extends Controller
{

    public function resepsionis()
    {
        // $data = Akun::All();
        // return view('akun', ['data' => $data]);
        
        $role = 'Resepsionis';
    
        $data = Akun::where('role', $role)->get();
        return view('resepsionis.akunresepsionis', ['data' => $data, 'role' => $role]);
    }


    public function hapus($id)
    {
        $data = Akun::where("id", $id)->delete();
        if($data) {
            return redirect()->to('/home')->with('status', 'Berhasil Ubah Data');
        } else
            return json_encode(array('status'=>false, 'Gagal Hapus Data'));
    }

    public function tambah()
    {
        $lastAkun = Akun::orderBy('id', 'desc')->first();

        if ($lastAkun) {
            $newId = $lastAkun->id + 1;
        } else {
            $newId = 1;
        }

        return view('tambah-akun', [
            'newId' => $newId,
        ]);
    }
    
    public function simpan(request $request)
    {
        $data = array(
            'id'=>$request->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, 
            'password' => Hash::make($request->password),
        );

        $data = User::create($data);
        if($data) {
            return redirect()->to('/home')->with('status', 'Berhasil Ubah Data');
        } else
            return json_encode(array('status'=>true, 'Gagal Tambah Data'));
    }

    public function ubah($id)
    {
        $data = Akun::where("id", $id)->get();
        return view('ubah-akun', ['data'=>$data]);
    }
    
    public function edit(request $request)
    {
        $data = User::where("id", $request->id)->update(array(
            'id'=>$request->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, 
            'password' => Hash::make($request->password),
        ));
        
        if($data) {
            return redirect()->to('/home')->with('status', 'Berhasil Ubah Data');
        } else
            return json_encode(array('status'=>false, 'Gagal Ubah Data'));
    }
}

