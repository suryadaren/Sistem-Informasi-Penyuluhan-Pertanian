<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;
use App\process_laporan_penyuluhan;
use App\process_draft_programa;
use App\jadwal;
use App\notifikasi;
use App\surat_tugas;
use \Carbon\Carbon;

class BppController extends Controller
{
    public function __construct()
    {
        $this->middleware('bpp');
    }



    public function profil(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $user = user::where("id",auth()->guard('bpp')->id())->first();
    	return view('bpp/profil',compact('user','notifbaru'));
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
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $notifikasi = notifikasi::where('penerima',auth()->guard('penyuluh')->user()->kecamatan)->orderBy('created_at','desc')->get();
        return view('bpp/notifikasi',compact('notifikasi','notifbaru'));
    }
    public function lihat_notifikasi($id){
        $notif = notifikasi::where("id",$id)->first();

        $data = ["status" => "sudah di baca"];

        notifikasi::where("id",$id)->update($data);

        if($notif->type == "laporan"){
            return redirect('bpp/detail_laporan_penyuluhan/'.$notif->id_berkas);
        }
        elseif($notif->type == "draft"){
            return redirect('bpp/detail_draft_programa/'.$notif->id_berkas);
        }
        elseif($notif->type == "proposal"){
            return redirect('bpp/detail_proposal_dana/'.$notif->id_berkas);
        }
        elseif($notif->type == "dana"){
            return redirect('bpp/detail_pengiriman_dana/'.$notif->id_berkas);
        }
        else{
            return redirect('bpp/detail_surat_tugas/'.$notif->id_berkas);
        }
    }
   

    public function daftar_laporan_penyuluhan(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $laporan_penyuluhan = laporan_penyuluhan::orderBy('jadwal_penyuluhan','asc')->get();
        return view('bpp/daftar_laporan_penyuluhan',compact('laporan_penyuluhan','notifbaru'));
    }
    public function detail_laporan_penyuluhan($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $laporan = laporan_penyuluhan::where("id",$id)->first();
        $foto = json_decode($laporan->foto);
        return view('bpp/detail_laporan_penyuluhan',compact('laporan','foto','notifbaru'));
    }
    public function process_laporan_penyuluhan($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        return view('bpp/process_laporan_penyuluhan',compact('id','notifbaru'));
    }
    public function input_process_laporan_penyuluhan($id, Request $request){
        $this->validate($request, [
            "des_tema" => "required",
            "des_isi" => "required",
            "des_foto" => "required",
            "des_berkas" => "required"
        ],[
            "des_tema.required" => "form tidak boleh kosong",
            "des_isi.required" => "form tidak boleh kosong",
            "des_foto.required" => "form tidak boleh kosong",
            "des_berkas.required" => "form tidak boleh kosong"
        ]);
        $laporan = laporan_penyuluhan::where('id',$id)->first();
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

            $data_notifikasi = [
                "pengirim" => auth()->guard('bpp')->id(),
                "penerima" => $laporan->draft_programa->user->id,
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan di terima bpp",
                "status" => "belum di baca"
            ];

            $data_notifikasi2 = [
                "pengirim" => auth()->guard('bpp')->id(),
                "penerima" => "pegawai dinas",
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan penyuluhan baru",
                "status" => "belum di baca"
            ];
            notifikasi::create($data_notifikasi2);

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

            $data_notifikasi = [
                "pengirim" => auth()->guard('bpp')->id(),
                "penerima" => $laporan->draft_programa->user->id,
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan di tolak bpp",
                "status" => "belum di baca"
            ];

            $data_status = [
                "status" => "unvalid oleh bpp"
            ];
        }
        laporan_penyuluhan::where('id',$id)->update($data_status);
        process_laporan_penyuluhan::create($data);
        notifikasi::create($data_notifikasi);
        $notif = [
            "message" => "Update Data Berhasil",
            "alert-type" => "success"
        ];
        return redirect('bpp/detail_laporan_penyuluhan/'.$id)->with($notif);
    }

    // BAGIAN DRAFT PROGRAMA

    public function daftar_draft_programa(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $draft_programa = draft_programa::orderBy('updated_at','desc')->get();
        return view('bpp/daftar_draft_programa',compact('draft_programa','notifbaru'));
    }
    public function detail_draft_programa($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $draft = draft_programa::where("id",$id)->first();
        return view('bpp/detail_draft_programa',compact('draft','notifbaru'));
    }
    public function process_draft_programa($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        return view('bpp/process_draft_programa',compact('id','notifbaru'));
    }
    public function input_process_draft_programa($id, Request $request){

        $this->validate($request, [
            "des_pendahuluan" => "required",
            "des_keadaan" => "required",
            "des_tujuan" => "required",
            "des_permasalahan" => "required",
            "des_berkas" => "required",
        ],[
            "des_pendahuluan.required" => "form tidak boleh kosong",
            "des_keadaan.required" => "form tidak boleh kosong",
            "des_tujuan.required" => "form tidak boleh kosong",
            "des_permasalahan.required" => "form tidak boleh kosong",
            "des_berkas.required" => "form tidak boleh kosong",
        ]);

        $draft = draft_programa::where("id",$id)->first();
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

            $data_notifikasi = [
                "pengirim" => auth()->guard('bpp')->id(),
                "penerima" => $draft->user->id,
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft programa di terima bpp",
                "status" => "belum di baca"
            ];

            $data_notifikasi2 = [
                "pengirim" => auth()->guard('bpp')->id(),
                "penerima" => "pegawai dinas",
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft programa baru",
                "status" => "belum di baca"
            ];
            notifikasi::create($data_notifikasi2);

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

            $data_notifikasi = [
                "pengirim" => auth()->guard('bpp')->id(),
                "penerima" => $draft->user->id,
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft programa di tolak bpp",
                "status" => "belum di baca"
            ];
            
            $data_status = [
                "status" => "unvalid oleh bpp"
            ];
        }
        if (draft_programa::where('id',$id)->update($data_status)) {
            
            if (process_draft_programa::create($data)) {
                $notif = [
                    "message" => "Update Data Berhasil",
                    "alert-type" => "success"
                ];

                notifikasi::create($data_notifikasi);

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
        return redirect('bpp/detail_draft_programa/'.$id)->with($notif);
    }


    public function daftar_surat_tugas(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $surat_tugas = surat_tugas::where("status","diterbitkan")->get();
        return view('bpp/daftar_surat_tugas',compact('surat_tugas','notifbaru'));
    }
    public function detail_surat_tugas($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('bpp')->user()->kecamatan
        ])->get());
        $surat = surat_tugas::where("id",$id)->first();
        return view('penyuluh/detail_surat_tugas',compact('surat','notifbaru'));
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
    // 
    // public function dashboard($date = null){
    //     dd("dashboard");
    //     $jadwal = jadwal::get();
    //     $now = Carbon::now()->format('Y-m-d');
    //     $data = ["status" => "missing"];
    //     $jadwal_date;
    //     foreach ($jadwal as $j) {
    //         $tanggal = Carbon::parse($j->tanggal)->format('Y-m-d');
    //         if($now > $tanggal && $j->status == "pending"){
    //             jadwal::where("id", $j->id)->update($data);
    //         }
    //     }
    //     if($date != null){
    //         $tanggal = Carbon::parse($date)->format('Y/m/d');
    //         $jadwal_date=jadwal::where("tanggal",$tanggal)->get();
    //     }else{
    //         $tanggal = Carbon::now()->format('Y/m/d');
    //         $jadwal_date=jadwal::where("tanggal",$tanggal)->get();
    //     }
    //     return view('bpp/dashboard1',compact('jadwal_date','tanggal'));
    // }

    // public function daftar_surat_tugas(){
    //     return view('bpp/daftar_surat_tugas');
    // }
    // public function detail_surat_tugas(){
    //     return view('bpp/detail_surat_tugas');
    // }

    // public function daftar_penyuluh_lapangan(){
    //     return view('bpp/daftar_penyuluh_lapangan');
    // }
    // public function detail_data_penyuluh_lapangan(){
    //     return view('bpp/detail_data_penyuluh_lapangan');
    // }
    // public function daftar_kelompok_tani(){
    //     return view('bpp/daftar_kelompok_tani');
    // }
    // public function detail_data_kelompok_tani(){
    //     return view('bpp/detail_data_kelompok_tani');
    // }
    // public function daftar_nagari(){
    //     return view('bpp/daftar_nagari');
    // }
    // public function detail_data_nagari(){
    //     return view('bpp/detail_data_nagari');
    // }
}

