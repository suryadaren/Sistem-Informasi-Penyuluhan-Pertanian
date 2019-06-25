<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function pengguna(){
    	$user = user::where("jabatan","!=","admin")->get();
    	return view('admin/pengguna',compact('user'));
    }
    public function tambah_pengguna(){
    	return view('admin/tambah_pengguna');
    }
    public function input_tambah_pengguna(Request $request){

        $this->validate($request, [
            "nama" => "required",
            "username" => "required",
            "password" => "required",
            "nip" => "required",
            "email" => "required",
            "desa" => "required",
            "kecamatan" => "required",
            "jabatan" => "required",
            "foto" => "required|mimes:jpg,jpeg,png"
        ],[
            'nama.required' => 'form tidak boleh kosong',
            'username.required' => 'form tidak boleh kosong',
            'foto.required' => 'form tidak boleh kosong',
            'foto.mimes' => 'Foto harus berformat jpeg,jpg,png',
            'password.required' => 'Foto form tidak boleh kosong',
            'nip.required' => 'form tidak boleh kosong',
            'email.required' => 'form tidak boleh kosong',
            'desa.required' => 'form tidak boleh kosong',
            'kecamatan.required' => 'form tidak boleh kosong',
            'jabatan.required' => 'form tidak boleh kosong',
        ]);

        $foto = $request->foto;
        $fotoPath = $foto->store('public/fotoUser');

        $data = [
            "nama" => $request->nama,
            "username" => $request->username,
            "password" => bcrypt($request->password),
            "nip" => $request->nip,
            "email" => $request->email,
            "desa" => $request->desa,
            "kecamatan" => $request->kecamatan,
            "jabatan" => $request->jabatan,
            "foto" => $fotoPath
        ];

        user::create($data);

        $notif = [
            "message" => "Update Data Berhasil",
            "alert-type" => "success"
        ];

    	return back()->with($notif);
    }
    public function lihat_pengguna($id){
    	$user = user::where("id",$id)->first();
    	return view('admin/lihat_pengguna',compact('user'));
    }
    public function edit_pengguna($id){
    	$user = user::where("id",$id)->first();
    	return view('admin/edit_pengguna',compact('user'));
    }
    public function input_edit_pengguna($id,Request $request){
        if ($request->has('foto')) {
            if ($request->password) {
                $foto = $request->foto;
                $fotoPath = $foto->store('public/fotoUser');
                $data = [
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "password" => bcrypt($request->password),
                    "nip" => $request->nip,
                    "email" => $request->email,
                    "jabatan" => $request->jabatan,
                    "desa" => $request->desa,
                    "kecamatan" => $request->kecamatan,
                    "foto" => $fotoPath,
                ];
            }else{
                $foto = $request->foto;
                $fotoPath = $foto->store('public/fotoUser');
                $data = [
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "nip" => $request->nip,
                    "email" => $request->email,
                    "jabatan" => $request->jabatan,
                    "desa" => $request->desa,
                    "kecamatan" => $request->kecamatan,
                    "foto" => $fotoPath,
                ];
            }
        }else{
            if ($request->password) {
                $data = [
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "password" => bcrypt($request->password),
                    "nip" => $request->nip,
                    "email" => $request->email,
                    "jabatan" => $request->jabatan,
                    "desa" => $request->desa,
                    "kecamatan" => $request->kecamatan
                ];
            }else{
                $data = [
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "nip" => $request->nip,
                    "email" => $request->email,
                    "jabatan" => $request->jabatan,
                    "desa" => $request->desa,
                    "kecamatan" => $request->kecamatan
                ];
            }
        }
        if (user::where('id',$id)->update($data)) {
            $notif = [
                "message" => "Update Data Berhasil",
                "alert-type" => "success"
            ];
        }else{
            $notif = [
                "message" => "Update Data Gagal",
                "alert-type" => "error"
            ];
        }
        return back()->with($notif);
    }
    public function hapus_pengguna(Request $request){
    	user::where("id",$request->id)->delete();
	    	$notif = [
                "message" => "Hapus Data Berhasil",
                "alert-type" => "success"
            ];
        return redirect('admin/pengguna')->with($notif);
    }
}
