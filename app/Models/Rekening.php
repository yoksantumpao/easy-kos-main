<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_pengelola',
        'nama_bank',
        'no_rek',
        'atn'
    ];
}
