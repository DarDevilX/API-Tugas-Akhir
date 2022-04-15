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
        $user = User::where('nis', $req->nis)->first();
        if(!$user){
            return ["error" => "Invalid username / password"];
        }elseif($req->password != $user->password){
            return ["error" => "Invalid username / password"];
        }else{
            return $user;
        }
        
    }
}
