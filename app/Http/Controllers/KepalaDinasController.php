<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\surat_tugas;
use App\proposal_dana;
use App\user;
use App\process_surat_tugas;
use App\process_proposal_dana;
use App\notifikasi;

class KepalaDinasController extends Controller
{
    public function __construct()
    {
        $this->middleware('kepala_dinas');
    }
    public function profil(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        $user = user::where("id",auth()->guard('kepala_dinas')->id())->first();
    	return view('kepala_dinas/profil',compact('user','notifbaru'));
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
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        $notifikasi = notifikasi::where('penerima',"kepala dinas")->orderBy('created_at','desc')->get();
        return view('kepala_dinas/notifikasi',compact('notifikasi','notifbaru'));
    }
    public function lihat_notifikasi($id){
        $notif = notifikasi::where("id",$id)->first();

        $data = ["status" => "sudah di baca"];

        notifikasi::where("id",$id)->update($data);

        if($notif->type == "laporan"){
            return redirect('kepala_dinas/detail_laporan_penyuluhan/'.$notif->id_berkas);
        }
        elseif($notif->type == "draft"){
            return redirect('kepala_dinas/detail_draft_programa/'.$notif->id_berkas);
        }
        elseif($notif->type == "proposal"){
            return redirect('kepala_dinas/detail_proposal_dana/'.$notif->id_berkas);
        }
        elseif($notif->type == "dana"){
            return redirect('kepala_dinas/detail_pengiriman_dana/'.$notif->id_berkas);
        }
        else{
            return redirect('kepala_dinas/detail_surat_tugas/'.$notif->id_berkas);
        }
    }
   
    public function daftar_surat_tugas(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        $surat_tugas = surat_tugas::orderBy('status','asc')->get();
        return view('kepala_dinas/daftar_surat_tugas',compact('surat_tugas','notifbaru'));
    }
    public function detail_surat_tugas($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        $surat = surat_tugas::where("id",$id)->first();
        return view('kepala_dinas/detail_surat_tugas',compact('surat','notifbaru'));
    }
    public function process_surat_tugas($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        return view('kepala_dinas/process_surat_tugas',compact('id','notifbaru'));
    }
    public function input_process_surat_tugas($id, Request $request){

        $this->validate($request, [
            "des_isi" => "required",
            "des_berkas" => "required"
        ],[
            "des_isi.required" => "form tidak boleh kosong",
            "des_berkas.required" => "form tidak boleh kosong",
        ]);

        $id_draft = surat_tugas::where("id",$id)->first();
        if($request->isi && $request->berkas){
            $data = [
                "surat_tugas_id" => $id,
                "status_isi" => $request->isi,
                "des_isi" => $request->des_isi,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "valid oleh kepala dinas"
            ];
            $data_draft = [
                "status" => "surat tugas di terima kepala dinas"
            ];

            $data_notifikasi = [
                "pengirim" => auth()->guard('kepala_dinas')->id(),
                "penerima" => "pegawai dinas",
                "id_berkas" => $id,
                "type" => "surat",
                "deskripsi" => "surat tugas ".$id_draft->draft_programa->user->nama." diterima kepala dinas",
                "status" => "belum di baca"
            ];
        }else{
            $data = [
                "surat_tugas_id" => $id,
                "status_isi" => $request->isi,
                "des_isi" => $request->des_isi,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "unvalid oleh kepala dinas"
            ];
            $data_draft = [
                "status" => "valid oleh pegawai dinas"
            ];

            $data_notifikasi = [
                "pengirim" => auth()->guard('kepala_dinas')->id(),
                "penerima" => "pegawai dinas",
                "id_berkas" => $id,
                "type" => "surat",
                "deskripsi" => "surat tugas ".$id_draft->draft_programa->user->nama." ditolak kepala dinas",
                "status" => "belum di baca"
            ];
        }
        if ($surat = surat_tugas::where('id',$id)->update($data_status)) {
            
            if (process_surat_tugas::create($data)) {
                if (draft_programa::where("id",$id_draft->draft_programa_id)->update($data_draft)) {

                    notifikasi::create($data_notifikasi);
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
            }else{
                $notif = [
                    "message" => "Update Data Gagal",
                    "alert-type" => "error"
                ];
            }

        }
        else{
            $notif = [
                "message" => "Update Data Gagal",
                "alert-type" => "error"
            ];
        }
        return redirect('kepala_dinas/detail_surat_tugas/'.$id)->with($notif);
    }

    public function daftar_proposal_dana(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        $proposal_dana = proposal_dana::orderBy('status','asc')->get();
        return view('kepala_dinas/daftar_proposal_dana',compact('proposal_dana','notifbaru'));
    }
    public function detail_proposal_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        $proposal = proposal_dana::where("id",$id)->first();
        return view('kepala_dinas/detail_proposal_dana',compact('proposal','notifbaru'));
    }
    public function process_proposal_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "kepala dinas"
        ])->get());
        return view('kepala_dinas/process_proposal_dana',compact('id','notifbaru'));
    }
    public function input_process_proposal_dana($id, Request $request){
        $proposal_dana = proposal_dana::where('id',$id)->first();
        $this->validate($request, [
            "des_isi" => "required",
            "des_dana" => "required",
            "des_berkas" => "required"
        ],[
            "des_isi.required" => "form tidak boleh kosong",
            "des_dana.required" => "form tidak boleh kosong",
            "des_berkas.required" => "form tidak boleh kosong",
        ]);

        if($request->dana && $request->isi && $request->berkas){
            $data = [
                "proposal_dana_id" => $id,
                "status_dana" => $request->dana,
                "des_dana" => $request->des_dana,
                "status_isi" => $request->isi,
                "des_isi" => $request->des_isi,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "valid oleh kepala dinas"
            ];

            $data_notifikasi = [
                "pengirim" => auth()->guard('kepala_dinas')->id(),
                "penerima" => "pegawai dinas",
                "id_berkas" => $id,
                "type" => "proposal",
                "deskripsi" => "proposal dana ".$proposal_dana->draft_programa->user->nama." diterima kepala dinas",
                "status" => "belum di baca"
            ];
        }else{
            $data = [
                "proposal_dana_id" => $id,
                "status_dana" => $request->dana,
                "des_dana" => $request->des_dana,
                "status_isi" => $request->isi,
                "des_isi" => $request->des_isi,
                "status_berkas" => $request->berkas,
                "des_berkas" => $request->des_berkas,
            ];
            $data_status = [
                "status" => "unvalid oleh kepala dinas"
            ];

            $data_notifikasi = [
                "pengirim" => auth()->guard('kepala_dinas')->id(),
                "penerima" => "pegawai dinas",
                "id_berkas" => $id,
                "type" => "proposal",
                "deskripsi" => "proposal dana ".$proposal_dana->draft_programa->user->nama." ditolak kepala dinas",
                "status" => "belum di baca"
            ];
        }


        if (proposal_dana::where('id',$id)->update($data_status)) {
            
            if (process_proposal_dana::create($data)) {


                    notifikasi::create($data_notifikasi);
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

        }else{
            $notif = [
                "message" => "Update Data Gagal",
                "alert-type" => "error"
            ];
        }
        return redirect('kepala_dinas/detail_proposal_dana/'.$id)->with($notif);
    }

    // public function notifikasi(){
    //     return view('kepala_dinas/notifikasi');
    // }
    // public function lihat_notifikasi(){
    //     return view('kepala_dinas/lihat_notifikasi');
    // }
}
