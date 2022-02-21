<?php 
namespace App\Models;

use App\Modules\Auth\Models\User;
use App\Modules\Organization\Models\Company;
use App\Modules\Organization\Models\Employee;

class UserInfo {
    public ?User $user = null;
    public ?Employee $employee = null;
    public ?Company $company = null;
}