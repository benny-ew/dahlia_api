<?php

namespace App\Modules\Data\Models;

class Watermeter extends Entity
{

    protected $table = 'pelanggan.watermeterpelanggan';

    public $fillable = [
        'id',
        'nomersambungan', 
        'diameter', 
        'merk', 
        'nomerwatermeter', 
        'tanggalpasang', 
        'tanggaltera', 
        'nospk', 
        'keterangan', 
        'geom'    
    ];

    public $hidden = [
        ];

    public static function getRules($id = null): array
    {
       return [
        'id'=>'required',
        'nomersambungan'=>'required', 
        'diameter'=>'required', 
        'nomerwatermeter'=>'required', 
        'geom' =>'required'
       ];
    }
}
