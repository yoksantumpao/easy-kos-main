<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamar extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'nama_fs_kr',
        'deskripsi_fs_kr',
        'foto_fs_kr'
    ];
}
