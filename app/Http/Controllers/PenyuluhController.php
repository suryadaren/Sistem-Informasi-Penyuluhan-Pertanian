<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;

class PenyuluhController extends Controller
{
    public function profil(){
    	$user = user::where("id","1")->first();
        return view('penyuluh/profil',compact('user'));
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
    	return view('penyuluh/notifikasi');
    }
    public function lihat_notifikasi(){
    	return view('penyuluh/lihat_notifikasi');
    }

    public function daftar_kelompok_tani(){
    	return view('penyuluh/daftar_kelompok_tani');
    }
    public function detail_data_kelompok_tani(){
        return view('penyuluh/detail_data_kelompok_tani');
    }

    public function lihat_jadwal_penyuluhan(){
    	return view('penyuluh/lihat_jadwal_penyuluhan');
    }
    public function masukan_jadwal_penyuluhan(){
    	return view('penyuluh/masukan_jadwal_penyuluhan');
    }

    public function buat_laporan_penyuluhan(){
        return view('penyuluh/buat_laporan_penyuluhan');
    }
    public function input_laporan_penyuluhan(Request $request){
        $this->validate($request, [
            "tema" => "required",
            "content" => "required",
            "berkas" => "required|mimes:docx,pdf",
            "foto" => "required",
        ],[
            'tema.required' => 'Tema tidak boleh kosong',
            'content.required' => 'Content tidak boleh kosong',
            'berkas.required' => 'Berkas tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
            'berkas.mimes' => 'Foto harus bertype docx atau pdf',
        ]);

        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkasLaporan');
        $foto = $request->foto;
        foreach ($foto as $photo) {
            $fotoPath[] = $photo->store('public/fotoLaporan');
        }
        $fotoPathJson = json_encode($fotoPath);
        $data = [
            "penyuluh_id" => "1",
            "tema" => $request->tema,
            "content" => $request->content,
            "berkas" => $berkasPath,
            "foto" => $fotoPathJson,
            "status" => "belum diperiksa"
        ];
        if (laporan_penyuluhan::create($data)) {
            $notif = [
                'message' => 'Input Data Berhasil',
                'alert-type' => 'success'
            ];
        }else{
            $notif = [
                'message' => 'Input Data Gagal',
                'alert-type' => 'error'
            ];
        }
        return back()->with($notif);
    }
    public function daftar_laporan_penyuluhan(){
        $laporan_penyuluhan = laporan_penyuluhan::orderBy('id','desc')->get();
    	return view('penyuluh/daftar_laporan_penyuluhan',compact('laporan_penyuluhan'));
    }
    public function detail_laporan_penyuluhan($id){
        $laporan = laporan_penyuluhan::find($id)->first();
        $foto = json_decode($laporan->foto);
        return view('penyuluh/detail_laporan_penyuluhan',compact('laporan','foto'));
    }

    public function daftar_surat_tugas(){
        return view('penyuluh/daftar_surat_tugas');
    }
    public function detail_surat_tugas(){
        return view('penyuluh/detail_surat_tugas');
    }

    public function buat_draft_programa(){
        return view('penyuluh/buat_draft_programa');
    }
    public function input_draft_programa(Request $request){
        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkasDraft');
        $data = [
             "penyuluh_id" => "1",
             "latar_belakang" => $request['f1-latar-belakang'],
             "tujuan" => $request['f1-tujuan'],
             "manfaat" => $request['f1-manfaat'],
             "biofisik" => $request['f1-biofisik'],
             "sdm" => $request['f1-sdm'],
             "usaha_tani" => $request['f1-usaha-tani'],
             "tujuan_perilaku" => $request['f1-tujuan-perilaku'],
             "tujuan_non_perilaku" => $request['f1-tujuan-non-perilaku'],
             "masalah_perilaku" => $request['f1-masalah-perilaku'],
             "masalah_non_perilaku" => $request['f1-masalah-non-perilaku'],
             "total_dana" => $request['f1-total-dana'],
             "berkas" => $berkasPath,
             "status" => "belum diperiksa" 
        ];
        if (draft_programa::create($data)) {
            $notif = [
                "message" => "Input Data Berhasil",
                "alert-type" => "success"
            ];
        }
        else {
            $notif = [
                "message" => "Input Data Gagal",
                "alert-type" => "error"
            ];
        }
        return back()->with($notif);
    }
    public function daftar_draft_programa(){
        $draft_programa = draft_programa::get();
    	return view('penyuluh/daftar_draft_programa',compact('draft_programa'));
    }
    public function daftar_draft_programa_diterima(){
        return view('penyuluh/daftar_draft_programa_diterima');
    }
    // public function daftar_draft_programa_ditolak(){
    //     return view('penyuluh/daftar_draft_programa_ditolak');
    // }
    public function detail_draft_programa($id){
        $draft = draft_programa::find($id)->first();
        return view('penyuluh/detail_draft_programa',compact('draft'));
    }

    public function daftar_proposal_dana(){
        return view('penyuluh/daftar_proposal_dana');
    }
    public function detail_proposal_dana(){
        return view('penyuluh/detail_proposal_dana');
    }
}
