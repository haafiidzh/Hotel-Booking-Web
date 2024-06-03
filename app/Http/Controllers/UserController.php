<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function tampil()
    {
        $data = User::All();
        return view('user.index', ['data' => $data]);
    }

    public function tambah()
    {
        $userLast = User::orderBy('id', 'desc')->first();
        $idUserLast = $userLast ? $userLast->id : 0;
        $idUserNext = $idUserLast + 1;

        return view('user.tambah',['idUserNext'=>$idUserNext]);
    }

    // public function simpan(Request $request)
    // {
    //     $data = array(
    //         "id" => $request->id,
    //         "name" => $request->name,
    //         "email" => $request->email,
    //     );

    //     // $data['id_cust'] = $this->generateCustID(); // Menggunakan $this untuk memanggil method dalam class

    //     $user = User::create($data);
    //     if ($user) {
    //         return redirect('/user')->with(['status' => true, 'message' => 'Berhasil Tambah Data']);
    //     } else {
    //         return redirect('/user')->with(['status' => false, 'message' => 'Gagal Tambah Data']);
    //     }
    // }

    public function simpan(request $request)
    {
        $data = array(
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        );

        $data = User::create($data);
        if ($data) {
            return redirect()->to('/user')->with('status', 'Berhasil Ubah Data');
        } else
            return json_encode(array('status' => true, 'Gagal Tambah Data'));
    }

    public function ubah($id)
    {
        $data = User::where("id", $id)->get();
        return view('user.ubah', ['data' => $data]);
    }

    public function edit(request $request)
    {
        $data = User::where("id", $request->id)->update(array(
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ));

        if ($data) {
            return redirect()->to('/user')->with('status', 'Berhasil Ubah Data');
        } else
            return json_encode(array('status' => false, 'Gagal Ubah Data'));
    }

    // public function hapus($id): RedirectResponse
    // {
    //     $data = Akun::findOrFail($id);

    //     $data->delete();

    //     return redirect()->route('user')->with(['success' => 'Data Berhasil Dihapus!']);
    // }
    public function hapus($id)
    {
        $data = Akun::where("id", $id)->delete();

        if ($data->exist()) {
            return redirect('/user')->with('status', true)->with('message', 'Berhasil Hapus Data');
        } else {
            return response()->json([
                'status' => false,
                'pesan' => "Gagal Hapus",
            ]);
        }
    }
}
