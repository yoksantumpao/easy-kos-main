<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class PenghuniKos extends Authenticatable
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'nama_penghuni',
        'email_penghuni',
        'password',
        'jenis_kelamin',
        'no_telp',
        'no_wa',
        'pekerjaan',
        'nik',
        'ktp',
        'foto_profile',
    ];
}
