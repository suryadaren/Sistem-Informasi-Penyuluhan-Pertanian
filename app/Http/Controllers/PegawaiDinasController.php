<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;
use App\process_laporan_penyuluhan;
use App\process_draft_programa;
use App\surat_tugas;

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

    public function daftar_laporan_penyuluhan(){
        $laporan_penyuluhan = laporan_penyuluhan::where("status","valid oleh bpp")->orderBy('id','desc')->get();
        return view('pegawai_dinas/daftar_laporan_penyuluhan',compact('laporan_penyuluhan'));
    }
    public function detail_laporan_penyuluhan($id){
        $laporan = laporan_penyuluhan::find($id)->first();
        $foto = json_decode($laporan->foto);
        return view('pegawai_dinas/detail_laporan_penyuluhan',compact('laporan','foto'));
    }
    public function process_laporan_penyuluhan($id){
        return view('pegawai_dinas/process_laporan_penyuluhan',compact('id'));
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
                "status" => "valid oleh pegawai dinas"
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
                "status" => "unvalid oleh pegawai dinas"
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
        if (process_laporan_penyuluhan::where('laporan_penyuluhan_id',$id)->update($data)) {
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
        return redirect('pegawai_dinas/detail_laporan_penyuluhan/'.$id)->with($notif);
    }
    
    public function daftar_draft_programa(){
        $draft_programa = draft_programa::where("status","valid oleh bpp")->get();
        return view('pegawai_dinas/daftar_draft_programa',compact('draft_programa'));
    }
    public function detail_draft_programa($id){
        $draft = draft_programa::find($id)->first();
        return view('pegawai_dinas/detail_draft_programa',compact('draft'));
    }
    public function process_draft_programa($id){
        return view('pegawai_dinas/process_draft_programa',compact('id'));
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
                "status" => "valid oleh pegawai dinas"
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
                "status" => "unvalid oleh pegawai dinas"
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
        if (process_draft_programa::where('draft_programa_id',$id)->update($data)) {
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
        return redirect('pegawai_dinas/detail_draft_programa/'.$id)->with($notif);
    }



    public function daftar_surat_tugas(){
        $surat_tugas = surat_tugas::get();
        return view('pegawai_dinas/daftar_surat_tugas',compact('surat_tugas'));
    }
    public function pilih_draft_surat(){
        $draft_programa = draft_programa::where("status","valid oleh pegawai dinas")->get();
        return view('pegawai_dinas/pilih_draft_surat',compact('draft_programa'));
    }
    public function buat_surat_tugas($id){
        $draft = draft_programa::where('id',$id)->first();
        return view('pegawai_dinas/buat_surat_tugas',compact('draft'));
    }
    public function input_surat_tugas($id, Request $request){
        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkas_surat_tugas');
        $data = [
            "draft_programa_id" => $id,
            "content" => $request->content,
            "berkas" => $berkasPath,
            "status" => "belum di periksa"
        ];

        if (surat_tugas::create($data)) {
            $notif = [
                "message" => "Input Data Berhasil",
                "alert-type" => "success"
            ];
        }else{
            $notif = [
                "message" => "Input Data Gagal",
                "alert-type" => "error"
            ];
        }
        return back()->with($notif);
    }
    public function detail_surat_tugas($id){
        $surat = surat_tugas::where("id",$id)->first();
        return view('pegawai_dinas/detail_surat_tugas',compact('surat'));
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
}
