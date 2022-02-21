<?php

namespace App\Modules\Organization\Models;

use App\Modules\ByrnModel;
use App\Modules\Auth\Models\User;
use App\Modules\Organization\Models\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends ByrnModel
{
    
    protected $fillable = [
        'email',
        'name',
        'phone',
        'citizen_id',
        'position',
        'status',
        'user_id',
        'company_id'
    ];

    protected $with = ['company'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public static function getRules($id = null): array
    {
       return [
           'email'=>'email|required',
           'name'=>'required',
           'phone'=>'required',
           'status'=>'present',
           'user_id'=>'required|uuid',
           'company_id'=>'present|uuid',
       ];
    }


}
