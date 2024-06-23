<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengelola extends Authenticatable
{
    use HasFactory;
    // protected $guard = 'pemilik';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'jenis_kelamin', 
        'role', 
    ];
    
}
