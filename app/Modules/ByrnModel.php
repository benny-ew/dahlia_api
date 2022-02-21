<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Constants\Guard;



abstract class ByrnModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $guard_name = Guard::GUARD_NAME;

    public function getPrimaryKey(){
        return $this->primaryKey;
    }

}
