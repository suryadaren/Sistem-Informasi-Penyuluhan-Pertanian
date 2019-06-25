<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;
use App\process_laporan_penyuluhan;
use App\process_draft_programa;
use App\surat_tugas;
use App\proposal_dana;
use App\kirim_dana;
use App\notifikasi;

class PegawaiDinasController extends Controller
{
    public function __construct()
    {
        $this->middleware('pegawai_dinas');
    }
    public function profil(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $user = user::where("id",auth()->guard('pegawai_dinas')->id())->first();
    	return view('pegawai_dinas/profil',compact('user','notifbaru'));
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
            "penerima" => "pegawai dinas"
        ])->get());
        $notifikasi = notifikasi::where('penerima',"pegawai dinas")->orderBy('created_at','desc')->get();
        return view('pegawai_dinas/notifikasi',compact('notifikasi','notifbaru'));
    }
    public function lihat_notifikasi($id){
        $notif = notifikasi::where("id",$id)->first();

        $data = ["status" => "sudah di baca"];

        notifikasi::where("id",$id)->update($data);

        if($notif->type == "laporan"){
            return redirect('pegawai_dinas/detail_laporan_penyuluhan/'.$notif->id_berkas);
        }
        elseif($notif->type == "draft"){
            return redirect('pegawai_dinas/detail_draft_programa/'.$notif->id_berkas);
        }
        elseif($notif->type == "proposal"){
            return redirect('pegawai_dinas/detail_proposal_dana/'.$notif->id_berkas);
        }
        elseif($notif->type == "dana"){
            return redirect('pegawai_dinas/detail_pengiriman_dana/'.$notif->id_berkas);
        }
        else{
            return redirect('pegawai_dinas/detail_surat_tugas/'.$notif->id_berkas);
        }
    }
   

    public function daftar_laporan_penyuluhan(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $laporan_penyuluhan = laporan_penyuluhan::where("status","valid oleh bpp")
        ->orWhere("status","valid oleh pegawai dinas")
        ->orWhere("status","unvalid oleh pegawai dinas")
        ->orderBy('updated_at','desc')->get();
        return view('pegawai_dinas/daftar_laporan_penyuluhan',compact('laporan_penyuluhan','notifbaru'));
    }
    public function detail_laporan_penyuluhan($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $laporan = laporan_penyuluhan::where("id",$id)->first();
        $foto = json_decode($laporan->foto);
        return view('pegawai_dinas/detail_laporan_penyuluhan',compact('laporan','foto','notifbaru'));
    }
    public function process_laporan_penyuluhan($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        return view('pegawai_dinas/process_laporan_penyuluhan',compact('id','notifbaru'));
    }
    public function input_process_laporan_penyuluhan($id, Request $request){
        $laporan = laporan_penyuluhan::where("id",$id)->first();
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
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $laporan->draft_programa->user->kecamatan,
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan ".$laporan->draft_programa->user->nama." diterima pegawai dinas",
                "status" => "belum di baca"
            ];

            $data_notifikasi2 = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $laporan->draft_programa->user->id,
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan diterima pegawai dinas",
                "status" => "belum di baca"
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

            $data_notifikasi = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $laporan->draft_programa->user->kecamatan,
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan ".$laporan->draft_programa->user->nama." ditolak pegawai dinas",
                "status" => "belum di baca"
            ];

            $data_notifikasi2 = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $laporan->draft_programa->user->id,
                "id_berkas" => $id,
                "type" => "laporan",
                "deskripsi" => "laporan ditolak pegawai dinas",
                "status" => "belum di baca"
            ];
            $data_status = [
                "status" => "unvalid oleh pegawai dinas"
            ];
        }
        laporan_penyuluhan::where('id',$id)->update($data_status);
        process_laporan_penyuluhan::where('laporan_penyuluhan_id',$id)->update($data);
        notifikasi::create($data_notifikasi);
        notifikasi::create($data_notifikasi2);
        $notif = [
            "message" => "Update Data Berhasil",
            "alert-type" => "success"
        ];
        return redirect('pegawai_dinas/detail_laporan_penyuluhan/'.$id)->with($notif);
    }
    
    // BAGIAN DRAFT PROGRAMA 
    
    public function daftar_draft_programa(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $draft_programa = draft_programa::where("status","-=","unvalid oleh bpp")
        ->orWhere("status","!=","belum diperiksa bpp")
        ->orderBy('updated_at','desc')->get();
        return view('pegawai_dinas/daftar_draft_programa',compact('draft_programa','notifbaru'));
    }
    public function detail_draft_programa($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $draft = draft_programa::where("id",$id)->first();
        return view('pegawai_dinas/detail_draft_programa',compact('draft','notifbaru'));
    }
    public function process_draft_programa($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        return view('pegawai_dinas/process_draft_programa',compact('id','notifbaru'));
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


            $data_notifikasi = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $draft->user->kecamatan,
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft ".$draft->user->nama." diterima pegawai dinas",
                "status" => "belum di baca"
            ];

            $data_notifikasi2 = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $draft->user->id,
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft programa diterima pegawai dinas",
                "status" => "belum di baca"
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
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $draft->user->kecamatan,
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft ".$draft->user->nama." ditolak pegawai dinas",
                "status" => "belum di baca"
            ];

            $data_notifikasi2 = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => $draft->user->id,
                "id_berkas" => $id,
                "type" => "draft",
                "deskripsi" => "draft programa ditolak pegawai dinas",
                "status" => "belum di baca"
            ];
            $data_status = [
                "status" => "unvalid oleh pegawai dinas"
            ];
        }
        draft_programa::where('id',$id)->update($data_status);
        process_draft_programa::where('draft_programa_id',$id)->update($data);
        notifikasi::create($data_notifikasi);
        notifikasi::create($data_notifikasi2);
        $notif = [
            "message" => "Update Data Berhasil",
            "alert-type" => "success"
        ];
        return redirect('pegawai_dinas/detail_draft_programa/'.$id)->with($notif);
    }



    public function daftar_surat_tugas(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $surat_tugas = surat_tugas::get();
        return view('pegawai_dinas/daftar_surat_tugas',compact('surat_tugas','notifbaru'));
    }
    public function pilih_draft_surat(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $draft_programa = draft_programa::where("status","valid oleh pegawai dinas")->orderBy("updated_at")->get();
        return view('pegawai_dinas/pilih_draft_surat',compact('draft_programa','notifbaru'));
    }
    public function buat_surat_tugas($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $draft = draft_programa::where('id',$id)->first();
        return view('pegawai_dinas/buat_surat_tugas',compact('draft','notifbaru'));
    }
    public function input_surat_tugas($id, Request $request){

        $this->validate($request, [
            "content" => "required",
            "berkas" => "required|mimes:docx,pdf",
        ],[
            "berkas.required" => "form tidak boleh kosong",
            "content.required" => "form tidak boleh kosong",
            "berkas.mimes" => "berkas harus berformat docx,pdf",
        ]);

        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkas_surat_tugas');
        $data = [
            "draft_programa_id" => $id,
            "content" => $request->content,
            "berkas" => $berkasPath,
            "status" => "belum diperiksa"
        ];
        $data_draft = [
            "status" => "proses pengesahan surat tugas"
        ];

        if ($id_surat = surat_tugas::create($data)->id) {
            
            if (draft_programa::where("id",$id)->update($data_draft)) {
                

                $data_notifikasi = [
                    "pengirim" => auth()->guard('pegawai_dinas')->id(),
                    "penerima" => "kepala dinas",
                    "id_berkas" => $id_surat,
                    "type" => "surat",
                    "deskripsi" => "surat tugas baru",
                    "status" => "belum di baca"
                ];
                notifikasi::create($data_notifikasi);

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
        }else{
            $notif = [
                "message" => "Input Data Gagal",
                "alert-type" => "error"
            ];
        }
        return redirect('pegawai_dinas/pilih_draft_surat')->with($notif);
    }
    public function detail_surat_tugas($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $surat = surat_tugas::where("id",$id)->first();
        return view('pegawai_dinas/detail_surat_tugas',compact('surat','notifbaru'));
    }
    public function terbitkan_surat_tugas($id){
        $data = ["status" => "diterbitkan"];
        $data_draft = ["status" => "surat tugas diterbitkan"];
        $id_draft = surat_tugas::where("id",$id)->first();

        if (surat_tugas::where("id",$id)->update($data)) {
            
            if (draft_programa::where("id",$id_draft->draft_programa_id)->update($data_draft)) {
                $notif = [
                    "message" => "Menerbitkan Surat Tugas Berhasil",
                    "alert-type" => "success"
                ];
            }else{
                $notif = [
                    "message" => "Menerbitkan Surat Tugas Gagal",
                    "alert-type" => "error"
                ];
            }
        }else{
            $notif = [
                "message" => "Menerbitkan Surat Tugas Gagal",
                "alert-type" => "error"
            ];
        }
        return back()->with($notif);
    }



    public function pilih_draft_dana(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $draft_programa = draft_programa::where("status","surat tugas diterbitkan")->get();
        return view('pegawai_dinas/pilih_draft_dana',compact('draft_programa','notifbaru'));
    }
    public function buat_proposal_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $draft = draft_programa::where("id",$id)->first();
        return view('pegawai_dinas/buat_proposal_dana',compact('draft','notifbaru'));
    }
    public function daftar_proposal_dana(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $proposal_dana = proposal_dana::get();
        return view('pegawai_dinas/daftar_proposal_dana',compact('proposal_dana','notifbaru'));
    }
    public function detail_proposal_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $proposal = proposal_dana::where("id",$id)->first();
        return view('pegawai_dinas/detail_proposal_dana',compact('proposal','notifbaru'));
    }
    public function input_proposal_dana($id, Request $request){

        $this->validate($request, [
            "dana_dikirim" => "required",
            "content" => "required",
            "berkas" => "required|mimes:docx,pdf",
        ],[
            "berkas.required" => "form tidak boleh kosong",
            "content.required" => "form tidak boleh kosong",
            "dana_dikirim.required" => "form tidak boleh kosong",
            "berkas.mimes" => "berkas harus berformat docx,pdf",
        ]);

        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkas_proposal_dana');
        $data = [
            "draft_programa_id" => $id,
            "dana_dikirim" => $request->dana_dikirim,
            "content" => $request->content,
            "berkas" => $berkasPath,
            "status" => "belum diperiksa kepala dinas"
        ];

        if ($id_proposal = proposal_dana::create($data)->id) {
            $notif = [
                "message" => "Input Data Berhasil",
                "alert-type" => "success"
            ];
            $data_notifikasi = [
                "pengirim" => auth()->guard('pegawai_dinas')->id(),
                "penerima" => "kepala dinas",
                "id_berkas" => $id_proposal,
                "type" => "proposal",
                "deskripsi" => "proposal dana baru",
                "status" => "belum di baca"
            ];
            notifikasi::create($data_notifikasi);

        }else{
            $notif = [
                "message" => "Input Data Gagal",
                "alert-type" => "error"
            ];
        }
        return redirect('pegawai_dinas/pilih_draft_dana')->with($notif);
    }



    public function kirim_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $proposal = proposal_dana::where("id",$id)->first();
        return view('pegawai_dinas/kirim_dana',compact('proposal','notifbaru'));
    }
    public function input_kirim_dana($id, $dana, Request $request){
        $proposal_dana = proposal_dana::where("id",$id)->first();
        $this->validate($request, [
            "norek" => "required",
            "bank_pengirim" => "required",
            "berkas" => "required"
        ],[
            'norek.required' => 'No. rekening tidak boleh kosong',
            'bank_pengirim.required' => 'Nama Bank Pengirim tidak boleh kosong',
            'berkas.required' => 'Foto Bukti Pengiriman tidak boleh kosong'
        ]);
        $berkasPath = $request->berkas->store('public/berkasDana');
        $data = [
            "proposal_dana_id" => $id,
            "jumlah" => $dana,
            "norek" => $request->norek,
            "nama_pengirim" => $request->nama_pengirim,
            "bank_pengirim" => $request->bank_pengirim,
            "berkas" => $berkasPath,
            "status" => "dana dikirim"
        ];

        $status = ["status" => "dana dikirim"];

        if ($kirim = kirim_dana::create($data)->id) {
            if (proposal_dana::where('id',$id)->update($status)) {
                $data_notifikasi = [
                    "pengirim" => auth()->guard('pegawai_dinas')->id(),
                    "penerima" => $proposal_dana->draft_programa->user->id,
                    "id_berkas" => $id_kirim,
                    "type" => "dana",
                    "deskripsi" => "Dana di kirim pegawai dinas",
                    "status" => "belum di baca"
                ];
                notifikasi::create($data_notifikasi);
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
        }else{
            $notif = [
                "message" => "Input Data Gagal",
                "alert-type" => "error"
            ];
        }
        return back()->with($notif);
    }
    public function daftar_pengiriman_dana(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $dana = kirim_dana::orderBy("created_at")->get();
        return view('pegawai_dinas/daftar_pengiriman_dana',compact('dana','notifbaru'));
    }

    public function detail_pengiriman_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => "pegawai dinas"
        ])->get());
        $dana = kirim_dana::where("id",$id)->first();
        return view('pegawai_dinas/detail_pengiriman_dana',compact('dana','notifbaru'));
    }


    
    // public function notifikasi(){
    //     return view('pegawai_dinas/notifikasi');
    // }
    // public function lihat_notifikasi(){
    //     return view('pegawai_dinas/lihat_notifikasi');
    // }

    // public function daftar_penyuluh_lapangan(){
    //     return view('pegawai_dinas/daftar_penyuluh_lapangan');
    // }
    // public function detail_data_penyuluh_lapangan(){
    //     return view('pegawai_dinas/detail_data_penyuluh_lapangan');
    // }
    // public function daftar_kelompok_tani(){
    //     return view('pegawai_dinas/daftar_kelompok_tani');
    // }
    // public function detail_data_kelompok_tani(){
    //     return view('pegawai_dinas/detail_data_kelompok_tani');
    // }
    // public function daftar_kepala_bpp(){
    //     return view('pegawai_dinas/daftar_kepala_bpp');
    // }
    // public function detail_data_kepala_bpp(){
    //     return view('pegawai_dinas/detail_data_kepala_bpp');
    // }
    // public function daftar_nagari(){
    //     return view('pegawai_dinas/daftar_nagari');
    // }
    // public function detail_data_nagari(){
    //     return view('pegawai_dinas/detail_data_nagari');
    // }
    // public function daftar_kecamatan(){
    //     return view('pegawai_dinas/daftar_kecamatan');
    // }
    // public function detail_data_kecamatan(){
    //     return view('pegawai_dinas/detail_data_kecamatan');
    // }
}
