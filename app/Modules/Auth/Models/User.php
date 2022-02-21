<?php

namespace App\Modules\Auth\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use App\Constants\Guard;
use App\Modules\Organization\Models\Employee;
use App\Modules\Organization\Models\Company;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Models\Role;


class User extends Authenticatable
{
    use HasRoles,HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    protected $primaryKey = 'id';

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $guard_name = Guard::GUARD_NAME;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    protected $with = ['employee'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee() : HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function getPrimaryKey(){
        return $this->primaryKey;
    }

    public static function getRules($id = null): array
    {
       return [
           'id'=>'required|uuid',
           'name'=>'required',
           'email'=>'email|required',
           'password'=>'required|min:6|password:api'
       ];
    }

    public function getCompanyId() : ?string
    {
        
        if ($this->employee != null)
            if ($this->employee->company != null)
                return $this->employee->company->id;
            else
                return null;
        else
            return null;
    }

    public function getCompanyName() : ?string
    {
        
        if ($this->employee != null)
            if ($this->employee->company != null)
                return $this->employee->company->name;
            else
                return null;
        else
            return null;
    }

}
