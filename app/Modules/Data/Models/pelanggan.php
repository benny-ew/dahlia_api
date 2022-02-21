<?php

namespace App\Modules\Data\Models;

class Pelanggan extends Entity
{

    protected $table = 'pelanggan.bangunanpelanggan';

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
    
    public static function getRules($id = null): array
        {
           return [
            'id'=>'required|uuid',
            'nomersambungan'=>'required|max:20|unique',
            'nama'=>'required|max:50',
            'jenis'=>''//reguler, MBR 
           ];
        }
}
