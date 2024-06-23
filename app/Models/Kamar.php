<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_pengelola',
        'id_penghuni',
        'id_tipe_kamar',
        'id_rumah_kos',
        'nama_kamar',
        'status_kamar'
    ];
}
