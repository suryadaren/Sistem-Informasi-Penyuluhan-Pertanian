<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;

class PegawaiDinasController extends Controller
{
    public function profil(){
        $user = user::where("id","3")->first();
    	return view('pegawai_dinas/profil',compact('user'));
    }
    public function ubah_data($id,Request $request){
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
                    "desa" => $request->desa,
                    "kecamatan" => $request->kecamatan
                ];
            }else{
                $data = [
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "nip" => $request->nip,
                    "email" => $request->email,
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
    
    public function notifikasi(){
    	return view('pegawai_dinas/notifikasi');
    }
    public function lihat_notifikasi(){
    	return view('pegawai_dinas/lihat_notifikasi');
    }
    public function daftar_penyuluh_lapangan(){
        return view('pegawai_dinas/daftar_penyuluh_lapangan');
    }
    public function detail_data_penyuluh_lapangan(){
        return view('pegawai_dinas/detail_data_penyuluh_lapangan');
    }
    public function daftar_kelompok_tani(){
    	return view('pegawai_dinas/daftar_kelompok_tani');
    }
    public function detail_data_kelompok_tani(){
        return view('pegawai_dinas/detail_data_kelompok_tani');
    }
    public function daftar_kepala_bpp(){
        return view('pegawai_dinas/daftar_kepala_bpp');
    }
    public function detail_data_kepala_bpp(){
        return view('pegawai_dinas/detail_data_kepala_bpp');
    }
    public function daftar_nagari(){
        return view('pegawai_dinas/daftar_nagari');
    }
    public function detail_data_nagari(){
        return view('pegawai_dinas/detail_data_nagari');
    }
    public function daftar_kecamatan(){
        return view('pegawai_dinas/daftar_kecamatan');
    }
    public function detail_data_kecamatan(){
        return view('pegawai_dinas/detail_data_kecamatan');
    }
    public function daftar_laporan_penyuluhan(){
        return view('pegawai_dinas/daftar_laporan_penyuluhan');
    }
    public function detail_laporan_penyuluhan(){
        return view('pegawai_dinas/detail_laporan_penyuluhan');
    }
    public function buat_proposal_dana(){
        return view('pegawai_dinas/buat_proposal_dana');
    }
    public function daftar_proposal_dana(){
        return view('pegawai_dinas/daftar_proposal_dana');
    }
    public function detail_proposal_dana(){
        return view('pegawai_dinas/detail_proposal_dana');
    }
    public function daftar_draft_programa(){
        return view('pegawai_dinas/daftar_draft_programa');
    }
    public function detail_draft_programa(){
        return view('pegawai_dinas/detail_draft_programa');
    }
    public function daftar_surat_tugas(){
        return view('pegawai_dinas/daftar_surat_tugas');
    }
    public function detail_surat_tugas(){
        return view('pegawai_dinas/detail_surat_tugas');
    }
}
