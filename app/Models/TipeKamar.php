<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_pengelola',
        'nama_tipe',
        'harga_kamar',
        'ukuran_kamar',
        'foto_tipe_kamar',
        'fasilitas_kamar'
    ];
}
