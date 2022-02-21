<?php

namespace App\Modules\Data\Models;

use App\Modules\ByrnModel;

class Watermeter extends ByrnModel
{

    public $fillable = [
        'id',
        'nomersambungan', 
        'diameter', 
        'merk', 
        'nomerwatermeter', 
        'tanggalpasang', 
        'tanggaltera', 
        'nospk', 
        'fotowm', 
        'keterangan', 
        'geom'    
    ];

    public $hidden = [
        ];

    
}
