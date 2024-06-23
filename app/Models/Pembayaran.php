<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $fillable = [
        'id_pengelola',
        'id_penghuni',
        'id_kos',
        'id_kamar',
        'jlh_bln',
        'start_month',
        'end_month',
        'total_pembayaran',
        'status_pembayaran',
        'bukti_pembayaran',
    ];
}
