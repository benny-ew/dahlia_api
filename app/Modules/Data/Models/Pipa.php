<?php

namespace App\Modules\Data\Models;


class Pipa extends Entity
{

    // protected $connection = 'pipa';
    protected $table = 'perpipaan.pipa';

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
    
    public static function getRules($id = null): array
    {
       return [
        'id'=>'required',
        'diameter'=>'required', 
        'jenisbahan'=>'required', 
        'kategori'=>'required', 
        'nama_jalan'=>'required', 
        'keterangan'=>'required', 
        'geom'=>'required', 
        'sumberair'=>'required', 
        'wilayah'=>'required', 
        'zona'=>'required', 
        'blok'=>'required'
       ];
    }
}
