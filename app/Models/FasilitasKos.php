<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKos extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'nama_fs_ks',
        'id_pengelola',
        'deskripsi_fs_ks',
        'foto_fs_ks'
    ];
}
