<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan_penyuluhan;
use App\draft_programa;
use App\user;
use App\jadwal;
use App\surat_tugas;
use App\proposal_dana;
use App\kirim_dana;
use App\notifikasi;
use \Carbon\Carbon;

class PenyuluhController extends Controller
{
    public function __construct()
    {
        $this->middleware('penyuluh');
    }
    public function profil(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());

    	$user = user::where("id",auth()->guard('penyuluh')->id())->first();
        return view('penyuluh/profil',compact('user','notifbaru'));
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
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $notifikasi = notifikasi::where('penerima',auth()->guard('penyuluh')->id())->orderBy('created_at','desc')->get();
        return view('penyuluh/notifikasi',compact('notifikasi','notifbaru'));
    }
    public function lihat_notifikasi($id){
        $notif = notifikasi::where("id",$id)->first();

        $data = ["status" => "sudah di baca"];

        notifikasi::where("id",$id)->update($data);

        if($notif->type == "laporan"){
            return redirect('penyuluh/detail_laporan_penyuluhan/'.$notif->id_berkas);
        }
        elseif($notif->type == "draft"){
            return redirect('penyuluh/detail_draft_programa/'.$notif->id_berkas);
        }
        elseif($notif->type == "proposal"){
            return redirect('penyuluh/detail_proposal_dana/'.$notif->id_berkas);
        }
        elseif($notif->type == "dana"){
            return redirect('penyuluh/detail_pengiriman_dana/'.$notif->id_berkas);
        }
        else{
            return redirect('penyuluh/detail_surat_tugas/'.$notif->id_berkas);
        }
    }

    public function pilih_jadwal(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $laporan_penyuluhan = laporan_penyuluhan::orderBy("jadwal_penyuluhan","asc")->get();
        return view('penyuluh/pilih_jadwal',compact('laporan_penyuluhan','notifbaru'));
    }
    public function buat_laporan_penyuluhan($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $laporan = laporan_penyuluhan::where("id",$id)->first();
        return view('penyuluh/buat_laporan_penyuluhan',compact('laporan','notifbaru'));
    }
    public function input_laporan_penyuluhan(Request $request){
        $this->validate($request, [
            "content" => "required",
            "berkas" => "required|mimes:docx,pdf",
            "foto" => "required|mimes:jpg,jpeg,png",
            "dana_terpakai" => "required",
            "presensi" => "required|mimes:jpg,jpeg,png",
        ],[
            'content.required' => 'Content tidak boleh kosong',
            'berkas.required' => 'Berkas tidak boleh kosong',
            'berkas.mimes' => 'Berkas harus berformat docx atau pdf',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Foto harus berformat jpeg,jpg,png',
            'presensi.mimes' => 'Foto harus berformat jpeg,jpg,png',
            'presensi.required' => 'Foto presensi tidak boleh kosong',
            'dana_terpakai.required' => 'dana_terpakai tidak boleh kosong',
            'berkas.mimes' => 'Foto harus bertype docx atau pdf',
        ]);

        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkasLaporan');
        $fotoPresensi = $request->presensi;
        $fotoPresensiPath = $fotoPresensi->store('public/fotoPresensi');
        $foto = $request->foto;
        foreach ($foto as $photo) {
            $fotoPath[] = $photo->store('public/fotoLaporan');
        }
        $fotoPathJson = json_encode($fotoPath);
        $data = [
            "content" => $request->content,
            "berkas" => $berkasPath,
            "foto" => $fotoPathJson,
            "dana_terpakai" => $request->dana_terpakai,
            "presensi" => $fotoPresensiPath,
            "status" => "belum diperiksa bpp"
        ];
        laporan_penyuluhan::where('id',$request->id)->update($data);
            $data_notifikasi = [
                "pengirim" => auth()->guard('penyuluh')->id(),
                "penerima" => auth()->guard('penyuluh')->user()->kecamatan,
                "id_berkas" => $request->id,
                "type" => "laporan",
                "deskripsi" => "laporan penyuluhan baru",
                "status" => "belum di baca"
            ];
            notifikasi::create($data_notifikasi);
            $notif = [
                'message' => 'Input Data laporan Berhasil',
                'alert-type' => 'success'
            ];
        return back()->with($notif);
    }

    public function daftar_laporan_penyuluhan(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $laporan_penyuluhan = laporan_penyuluhan::where("status","!=","belum di kirim")->orderBy('jadwal_penyuluhan','asc')->get();
    	return view('penyuluh/daftar_laporan_penyuluhan',compact('laporan_penyuluhan','notifbaru'));
    }
    public function detail_laporan_penyuluhan($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $laporan = laporan_penyuluhan::where("id",$id)->first();
        $foto = json_decode($laporan->foto);
        return view('penyuluh/detail_laporan_penyuluhan',compact('laporan','foto','notifbaru'));
    }

    // BAGIAN DRAFT PROGRAMA

    public function buat_draft_programa(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        return view('penyuluh/buat_draft_programa', compact('notifbaru'));
    }
    public function input_draft_programa(Request $request){
        
        $this->validate($request, [
            "f1-latar-belakang" => "required",
            "f1-tujuan" => "required",
            "f1-manfaat" => "required",
            "f1-biofisik" => "required",
            "f1-sdm" => "required",
            "f1-usaha-tani" => "required",
            "f1-tujuan-perilaku" => "required",
            "f1-tujuan-non-perilaku" => "required",
            "f1-masalah-perilaku" => "required",
            "f1-masalah-non-perilaku" => "required",
            "f1-total-dana" => "required",
            "berkas" => "required|mimes:docx,pdf"
        ],[
            "f1-latar-belakang.required" => "form tidak boleh kosong",
            "f1-tujuan.required" => "form tidak boleh kosong",
            "f1-manfaat.required" => "form tidak boleh kosong",
            "f1-biofisik.required" => "form tidak boleh kosong",
            "f1-sdm.required" => "form tidak boleh kosong",
            "f1-usaha-tani.required" => "form tidak boleh kosong",
            "f1-tujuan-perilaku.required" => "form tidak boleh kosong",
            "f1-tujuan-non-perilaku.required" => "form tidak boleh kosong",
            "f1-masalah-perilaku.required" => "form tidak boleh kosong",
            "f1-masalah-non-perilaku.required" => "form tidak boleh kosong",
            "f1-total-dana.required" => "form tidak boleh kosong",
            "berkas.required" => "form tidak boleh kosong",
            "berkas.mimes" => "berkas harus berformat pdf,docx"
        ]);

        $max = count($request->materi);
        $max--;
        $data_jadwal;
        for ($i=0; $i < $max ; $i++) { 
            $data_jadwal[$i][0] = $request->materi[$i];
            $data_jadwal[$i][1] = $request->tanggal[$i];
        }
        $berkas = $request->berkas;
        $berkasPath = $berkas->store('public/berkasDraft');
        $data = [
             "penyuluh_id" => auth()->guard('penyuluh')->id(),
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
             "status" => "belum diperiksa bpp" 
        ];

        $draft = draft_programa::create($data)->id;
            
        foreach ($data_jadwal as $jadwal) {
            $data_input_jadwal = [
                "draft_programa_id" => $draft,
                "tema" => $jadwal[0],
                "jadwal_penyuluhan" => $jadwal[1],
                "status" => "belum di kirim"
            ];
            laporan_penyuluhan::create($data_input_jadwal);
        }

        $data_notifikasi = [
            "pengirim" => auth()->guard('penyuluh')->id(),
            "penerima" => auth()->guard('penyuluh')->user()->kecamatan,
            "id_berkas" => $draft,
            "type" => "draft",
            "deskripsi" => "draft programa baru",
            "status" => "belum di baca"
        ];
        notifikasi::create($data_notifikasi);
        $notif = [
                    "message" => "Input Data Berhasil",
                    "alert-type" => "success"
                 ];
        return back()->with($notif);
    }
    public function daftar_draft_programa(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $draft_programa = draft_programa::where("penyuluh_id",auth()->guard('penyuluh')->id())->orderBy("created_at","desc")->get();
    	return view('penyuluh/daftar_draft_programa',compact('draft_programa','notifbaru'));
    }
    public function detail_draft_programa($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $draft = draft_programa::where("id",$id)->first();
        return view('penyuluh/detail_draft_programa',compact('draft','notifbaru'));
    }

    // BAGIAN SURAT TUGAS
    public function daftar_surat_tugas(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $surat_tugas = surat_tugas::get();
        return view('penyuluh/daftar_surat_tugas',compact('surat_tugas','notifbaru'));
    }
    public function detail_surat_tugas($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $surat = surat_tugas::where("id",$id)->first();
        return view('penyuluh/detail_surat_tugas',compact('surat','notifbaru'));
    }

    // BAGIAN DANA

    public function daftar_pengiriman_dana(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $dana = kirim_dana::orderBy("created_at","desc")->get();
        return view('penyuluh/daftar_pengiriman_dana',compact('dana','notifbaru'));
    }
    public function detail_proposal_dana(){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        return view('penyuluh/detail_proposal_dana',compact('notifbaru'));
    }
    public function detail_pengiriman_dana($id){
        $notifbaru = count(notifikasi::where([
            "status"=>"belum di baca",
            "penerima" => auth()->guard('penyuluh')->id()
        ])->get());
        $dana = kirim_dana::where("id",$id)->first();
        return view('penyuluh/detail_pengiriman_dana',compact('dana','notifbaru'));
    }
    public function konfirmasi(Request $request){

        $dana = kirim_dana::where("id",$request->id)->first();
        
        $data = [
            "status" => "dana diterima penyuluh"
        ];

        $draft = draft_programa::where("id",$dana->proposal_dana->draft_programa->id)->first();

        $dana_awal = $draft->dana_terkirim;
        $dana_tambah = $dana->jumlah;

        $awal= str_replace(".", "", $dana_awal);
        $tambah= str_replace(".", "", $dana_tambah);

        $total = $awal+$tambah;

        $total_dana = number_format($total,0,',','.');

        $data_draft = ["dana_terkirim" => $total_dana];


        if (kirim_dana::where("id",$request->id)->update($data)) {
            
            if (proposal_dana::where("id",$dana->proposal_dana->id)->update($data)) {
                $notif = [
                    "message" => "Input Data Berhasil",
                    "alert-type" => "success"
                ];


                $data_notifikasi = [
                    "pengirim" => auth()->guard('penyuluh')->id(),
                    "penerima" => "pegawai dinas",
                    "id_berkas" => $request->id,
                    "type" => "dana",
                    "deskripsi" => "dana sudah diterima penyuluh",
                    "status" => "belum di baca"
                ];
                notifikasi::create($data_notifikasi);
                draft_programa::where('id',$id)->update($data_draft);

            }else{
                $notif = [
                    "message" => "Input Jadwal Gagal",
                    "alert-type" => "error"
                ];
            }
        }
        else {
            $notif = [
                "message" => "Input Draft Gagal",
                "alert-type" => "error"
            ];
        }
        return back()->with($notif);
    }





    // public function daftar_kelompok_tani(){
    //     return view('penyuluh/daftar_kelompok_tani');
    // }
    // public function detail_data_kelompok_tani(){
    //     return view('penyuluh/detail_data_kelompok_tani');
    // }

    // public function lihat_jadwal_penyuluhan(){
    //     return view('penyuluh/lihat_jadwal_penyuluhan');
    // }
    // public function masukan_jadwal_penyuluhan(){
    //     return view('penyuluh/masukan_jadwal_penyuluhan');
    // }


    


    // public function daftar_draft_programa_diterima(){
    //     return view('penyuluh/daftar_draft_programa_diterima');
    // }
    // public function daftar_draft_programa_ditolak(){
    //     return view('penyuluh/daftar_draft_programa_ditolak');
    // }
    // public function pilih_draft(){
    //     $draft_programa = draft_programa::where("penyuluh_id",auth()->guard('penyuluh')->id())->orderBy("updated_at","desc")->get();
    //     return view('penyuluh/pilih_draft',compact('draft_programa'));
    // }
    // public function lihat_jadwal($id){
    //     $jadwal = jadwal::where("draft_programa_id",$id)->get();
    //     return view('penyuluh/lihat_jadwal',compact('jadwal','id'));
    // }
    // public function input_jadwal(Request $request){
    //     $this->validate($request, [
    //         "materi" => "required",
    //         "tanggal" => "required"
    //     ],[
    //         'materi.required' => 'materi tidak boleh kosong',
    //         'tanggal.required' => 'Tanggal tidak boleh kosong'
    //     ]);
    //     $data = [
    //         "draft_programa_id" => $request->draft_programa_id,
    //         "materi" => $request->materi,
    //         "tanggal" => $request->tanggal,
    //     ];

    //     if (jadwal::create($data)) {
    //         $notif = [
    //             "message" => "Input Data Berhasil",
    //             "alert-type" => "success"
    //         ];
    //     }
    //     else {
    //         $notif = [
    //             "message" => "Input Data Gagal",
    //             "alert-type" => "error"
    //         ];
    //     }

    //     return back()->with($notif);
    // }


    

}
