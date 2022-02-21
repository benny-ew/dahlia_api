<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\Guard;



abstract class ByrnDataModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $guard_name = Guard::GUARD_NAME;

    public function getPrimaryKey(){
        return $this->primaryKey;
    }

}
