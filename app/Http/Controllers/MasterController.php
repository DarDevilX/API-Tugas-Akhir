<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Hash;

class MasterController extends Controller
{

    public function addPetugas(Request $req) {
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

    public function showPetugas() {
        $petugas = Petugas::all();
        return $petugas;
    }

    public function getById($id) {
        $petugas = Petugas::find($id);
        if(!$petugas || $petugas == null){
            return ['Error' => 'Data Not Found'];
        }else{
            return [
                'id' => $id,
                'Data' => $petugas
            ];
        }
    }

    public function editPetugas(Request $req, $id) {
        $petugas = Petugas::find($id);
        $petugas->nama = $req->input('nama');
        $petugas->username = $req->input('username');
        $petugas->password = $req->input('password');
        $petugas->update($req->all());
        if($petugas){
            return [
                "Data" => $petugas,
                "Status" => 200
            ];
        }else{
            return ["Status" => 500];
        }
    }

}
