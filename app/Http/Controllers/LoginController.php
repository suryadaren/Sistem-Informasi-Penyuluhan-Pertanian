<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view("login");
    }
    public function check_login(Request $request){
        if(auth()->guard('penyuluh')->attempt(array('email' => $request->email, 'password' => $request->password, 'jabatan' => 'penyuluh'))){
            $notif = [
                "message" => "Login Berhasil",
                "alert-type" => "success"
            ];
            return redirect(url('/penyuluh/profil'))->with($notif);
        }
        else if(auth()->guard('bpp')->attempt(array('email' => $request->email, 'password' => $request->password, 'jabatan' => 'bpp'))){
            $notif = [
                "message" => "Login Berhasil",
                "alert-type" => "success"
            ];
            return redirect(url('/bpp/profil'))->with($notif);
        }
        else if(auth()->guard('pegawai_dinas')->attempt(array('email' => $request->email, 'password' => $request->password, 'jabatan' => 'pegawai_dinas'))){
            $notif = [
                "message" => "Login Berhasil",
                "alert-type" => "success"
            ];
            return redirect(url('/pegawai_dinas/profil'))->with($notif);
        }
        else if(auth()->guard('kepala_dinas')->attempt(array('email' => $request->email, 'password' => $request->password, 'jabatan' => 'kepala_dinas'))){
            $notif = [
                "message" => "Login Berhasil",
                "alert-type" => "success"
            ];
            return redirect(url('/kepala_dinas/profil'))->with($notif);
        }
        else if(auth()->guard('admin')->attempt(array('email' => $request->email, 'password' => $request->password, 'jabatan' => 'admin'))){
            $notif = [
                "message" => "Login Berhasil",
                "alert-type" => "success"
            ];
            return redirect(url('/admin/pengguna'))->with($notif);
        }
        else{
            $notif = [
                "message" => "Email atau Password salah",
                "alert-type" => "error"
            ];
            return redirect('/')->with($notif);
        }
        
    }
    public function logout_penyuluh(){
        auth()->guard('penyuluh')->logout();
        return redirect(url('/'));
    }
    public function logout_bpp(){
        auth()->guard('bpp')->logout();
        return redirect(url('/'));
    }
    public function logout_pegawai_dinas(){
        auth()->guard('pegawai_dinas')->logout();
        return redirect(url('/'));
    }
    public function logout_kepala_dinas(){
        auth()->guard('kepala_dinas')->logout();
        return redirect(url('/'));
    }
    public function logout_admin(){
        auth()->guard('admin')->logout();
        return redirect(url('/'));
    }

}
