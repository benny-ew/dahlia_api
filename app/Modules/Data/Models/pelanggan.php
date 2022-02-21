<?php

namespace App\Modules\Data\Models;

use App\Modules\ByrnModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends ByrnModel
{

    public $fillable = [
        'id', 
        'nomersambungan', 
        'nama', 
        'alamat', 
        'golongantarif', 
        'status', 
        'nomerhp', 
        'fotorumah', 
        'jenis', 
        'jumlahpenghuni', 
        'zona', 
        'sumberair', 
        'keterangan', 
        'geom', 
        'wilayah', 
        'zona', 
        'blok'
    ];

    public $hidden = [
        ];
}
