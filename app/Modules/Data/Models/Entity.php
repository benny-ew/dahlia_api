<?php

namespace App\Modules\Data\Models;

use App\Modules\ByrnModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends ByrnModel
{

    public $fillable = [
        'id',
        'code',
        'name',
        'npwp',
        'address',
        'logo_url',
        'has_logo',
        'representative_name',
        'representative_position',
    ];

    public $hidden = [
        ];

    public function employee() : HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function account() : HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function bankAccount() : HasMany
    {
        return $this->hasMany(BankAccount::class);
    }

    public static function getRules($id = null): array
    {
       return [
        'id'=>'required|uuid',
        'code'=>'required|max:10|unique:companies',
        'name'=>'required|max:50',
        'npwp'=>'required|max:50',
        'address'=>'max:250',
        'representative_name'=>'max:250',
        'representative_position'=>'max:250',
       ];
    }

    public function hasLogo(): array
    {
        $path = glob(public_path('Entity/'.$this->id.'.*'));

        if (count($path) > 0){
            return [basename($path[0]),true];
          } else {
            return ['',false];
         }
    }
}
