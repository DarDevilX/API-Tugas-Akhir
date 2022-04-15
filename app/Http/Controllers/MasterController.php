<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Hash;

class MasterController extends Controller
{

    public function addPetugas(Request $req){
        $petugas;
        if($petugas = Petugas::where('nama', $req->input('nama'))->first()){
            return ['Error' => 'Duplicate Name/Username'];
        }elseif($petugas = Petugas::where('username', $req->input('username'))->first()){
            return ['Error' => 'Duplicate Name/Username'];
        }else{
            $petugas = new Petugas;
            $petugas->nama = $req->input('nama');
            $petugas->username = $req->input('username');
            $petugas->password = Hash::make($req->input('password'));
            $petugas->save();
            return $petugas;
        }
    }

    public function deletePetugas($id){
        $petugas = Petugas::where('id', $id)->delete();
        return ['Success' => 'Success Deleting Data'];
    }

}
