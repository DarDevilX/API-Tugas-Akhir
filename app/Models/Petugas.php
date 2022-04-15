<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $table = 'petugas';
    
}
