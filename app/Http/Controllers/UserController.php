<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\Master;
use App\Models\Petugas;
use App\Models\Transaction;
use App\Models\Siswa;
use App\Models\Register;

class UserController extends Controller
{

    public function auth(Request $req){
        $master = Master::where('username', $req->input('username'))->first();
        $petugas = Petugas::where('username', $req->input('username'))->first();
        $siswa = Siswa::where('nis', $req->input('username'))->first();
        if($master){
            if($master->password == $req->input('password')){
                return [
                    'name' => $master->nama,
                    'loggedin'  => true,
                    'role' => 'master'
                ];
            }else{
                return ['loggedin' => false];
            }
        }else if($petugas){
            if(Hash::check($req->input('password'), $petugas->password)){
                return [
                    'name' => $petugas->nama,
                    'loggedin'  => true,
                    'role' => 'petugas'
                ];
            }else{
                return ['loggedin' => false];
            }
        }else if($siswa){
            if($siswa->password == $req->input('password')){
                return [
 
                    'kelas' => $siswa->jurusan,
                    'name' => $siswa->nama,
                    'nik' => $siswa->nis,
                    'loggedin'  => true,
                    'role' => 'siswa'
                ];            
            }else{
                return ['loggedin' => false];
            }
        }else{
            return ['loggedin' => false];
        }
    }

    public function pay(Request $req){
        $pay = new Transaction;
        $pay->nis = $req->input('nis');
        $pay->nama = $req->input('nama');
        $pay->kelas = $req->input('kelas');
        $pay->jml_byr = $req->input('jumlah');
        $pay->tanggal = $req->input('tanggal');
        $pay->gambar = $req->input('img');
        $pay->save();
        return 200;
    }

    public function trShow(){
        $data = Transaction::All();
        return 200;
    }

    public function register(Request $req){
        $reg = new Register;
        $reg->nis = $req->input('nis');
        $reg->nama = $req->input('nama');
        $reg->password = $req->input('password');
        $reg->jurusan = $req->input('jurusan');
    }
}