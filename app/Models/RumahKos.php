<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahKos extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_pengelola',
        'id_fs_ks',
        'nama_kos',
        'jenis_kos',
        'jlh_kamar',
        'jlh_gedung',
        'no_telp', 
        'provinsi', 
        'kab_kota', 
        'kec', 
        'alamat', 
        'kode_pos', 
        'deskripsi', 
    ];
    
}
