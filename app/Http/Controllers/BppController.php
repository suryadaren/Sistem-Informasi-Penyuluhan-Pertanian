<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;
use App\process_laporan_penyuluhan;
use App\process_draft_programa;

class BppController extends Controller
{
    public function dashboard(){
        return view('bpp/dashboard');
    }
    public function profil(){
        $user = user::where("id","2")->first();
    	return view('bpp/profil',compact('user'));
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
    	return view('bpp/notifikasi');
    }
    public function lihat_notifikasi(){
    	return view('bpp/lihat_notifikasi');
    }

    public function daftar_laporan_penyuluhan(){
        $laporan_penyuluhan = laporan_penyuluhan::orderBy('id','desc')->get();
        return view('bpp/daftar_laporan_penyuluhan',compact('laporan_penyuluhan'));
    }
    public function detail_laporan_penyuluhan($id){
        $laporan = laporan_penyuluhan::where("id",$id)->first();
        $foto = json_decode($laporan->foto);
        return view('bpp/detail_laporan_penyuluhan',compact('laporan','foto'));
    }
    public function process_laporan_penyuluhan($id){
        return view('bpp/process_laporan_penyuluhan',compact('id'));
    }
    public function input_process_laporan_penyuluhan($id, Request $request){
        // dd($request->tema,$request->des_tema);
        if($request->tema && $request->isi && $request->foto && $request->berkas){
            $data = [
                "laporan_penyuluhan_id" => $id,
                "status_tema" => $request->tema,
                "des_tema" => $request->des_tema,
                "status_isi" => $request->isi,
                "des_isi" => $request->des_isi,
                "status_foto" => $request->foto,
                "des_foto" => $request->des_foto,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "valid oleh bpp"
            ];
        }else{
            $data = [
                "laporan_penyuluhan_id" => $id,
                "status_tema" => $request->tema,
                "des_tema" => $request->des_tema,
                "status_isi" => $request->isi,
                "des_isi" => $request->des_isi,
                "status_foto" => $request->foto,
                "des_foto" => $request->des_foto,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "unvalid oleh bpp"
            ];
        }
        if (laporan_penyuluhan::where('id',$id)->update($data_status)) {
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
        if (process_laporan_penyuluhan::create($data)) {
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
        return redirect('bpp/detail_laporan_penyuluhan/'.$id)->with($notif);
    }
    // public function setujui_laporan($id,Request $request){
    //     $content = "unvalid";
    //     $berkas = "unvalid";
    //     $foto = "unvalid";
    //     foreach ($request->cek as $c) {
    //         if ($c == "content") {
    //             $content = "valid";
    //         }
    //         elseif ($c == "berkas") {
    //             $berkas = "valid";
    //         }
    //         elseif ($c == "foto") {
    //             $foto = "valid";
    //         }
    //     }
    //     dd($content,$berkas,$foto);
    // }

    public function daftar_draft_programa(){
        $draft_programa = draft_programa::get();
        return view('bpp/daftar_draft_programa',compact('draft_programa'));
    }
    public function detail_draft_programa($id){
        $draft = draft_programa::where("id",$id)->first();
        return view('bpp/detail_draft_programa',compact('draft'));
    }
    public function process_draft_programa($id){
        return view('bpp/process_draft_programa',compact('id'));
    }
    public function input_process_draft_programa($id, Request $request){
        // dd($request->tema,$request->des_tema);
        if($request->pendahuluan && $request->keadaan && $request->tujuan && $request->permasalahan && $request->berkas){
            $data = [
                "draft_programa_id" => $id,
                "status_pendahuluan" => $request->pendahuluan,
                "des_pendahuluan" => $request->des_pendahuluan,
                "status_keadaan" => $request->keadaan,
                "des_keadaan" => $request->des_keadaan,
                "status_tujuan" => $request->tujuan,
                "des_tujuan" => $request->des_tujuan,
                "status_permasalahan" => $request->permasalahan,
                "des_permasalahan" => $request->des_permasalahan,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "valid oleh bpp"
            ];
        }else{
            $data = [
                "draft_programa_id" => $id,
                "status_pendahuluan" => $request->pendahuluan,
                "des_pendahuluan" => $request->des_pendahuluan,
                "status_keadaan" => $request->keadaan,
                "des_keadaan" => $request->des_keadaan,
                "status_tujuan" => $request->tujuan,
                "des_tujuan" => $request->des_tujuan,
                "status_permasalahan" => $request->permasalahan,
                "des_permasalahan" => $request->des_permasalahan,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "unvalid oleh bpp"
            ];
        }
        if (draft_programa::where('id',$id)->update($data_status)) {
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
        if (process_draft_programa::create($data)) {
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
        return redirect('bpp/detail_draft_programa/'.$id)->with($notif);
    }



    public function daftar_surat_tugas(){
        return view('bpp/daftar_surat_tugas');
    }
    public function detail_surat_tugas(){
        return view('bpp/detail_surat_tugas');
    }

    public function daftar_penyuluh_lapangan(){
        return view('bpp/daftar_penyuluh_lapangan');
    }
    public function detail_data_penyuluh_lapangan(){
        return view('bpp/detail_data_penyuluh_lapangan');
    }
    public function daftar_kelompok_tani(){
        return view('bpp/daftar_kelompok_tani');
    }
    public function detail_data_kelompok_tani(){
        return view('bpp/detail_data_kelompok_tani');
    }
    public function daftar_nagari(){
        return view('bpp/daftar_nagari');
    }
    public function detail_data_nagari(){
        return view('bpp/detail_data_nagari');
    }
}
