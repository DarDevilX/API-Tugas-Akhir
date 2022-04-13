<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Master;


class UserController extends Controller
{
    public function register(Request $req){
        
    }

    public function auth(Request $req){
        echo $req;
        $user = User::where('nis', $req->nis)->first();
        if(!$user || $req->password != $user->password){
            return ["Error" => "Invalid Username Or Password"];
        }else{
            return $user;
        }
    }
}
