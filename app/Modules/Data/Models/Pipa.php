<?php

namespace App\Modules\Data\Models;

use App\Modules\ByrnModel;

class Pipa extends ByrnModel
{

    public $fillable = [
        'id',
        'diameter', 
        'jenisbahan', 
        'kategori', 
        'nama_jalan', 
        'keterangan', 
        'geom', 
        'sumberair', 
        'wilayah', 
        'zona', 
        'blok'
    ];

    public $hidden = [
        ];

}
