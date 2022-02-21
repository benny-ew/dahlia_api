<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Modules\Organization\Models\Employee;
use App\Modules\Auth\Models\User;
use App\Modules\Organization\Models\Company;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::where('code','SMT')->first();

        $user = User::where('email','client@gmail.com')->first();
        Employee::create([
            'id'=>(string) Str::orderedUuid(),
            'email'=>'client@gmail.com',
            'name'=>'Benny Eko Willyanto',
            'phone'=>'5678909',
            'citizen_id'=>'345689856',
            'position'=>'Director',
            'status'=>'active',
            'user_id'=> $user->id,
            'company_id'=> $company->id,
        ]);

        $user2 = User::where('email','executive@gmail.com')->first();
        Employee::create([
            'id'=>(string) Str::orderedUuid(),
            'email'=>'executive@gmail.com',
            'name'=>'Dina Lestari',
            'phone'=>'5678909',
            'citizen_id'=>'345689856',
            'position'=>'Director',
            'status'=>'active',
            'user_id'=> $user2->id,
            'company_id'=> $company->id,
        ]);

        $company2 = Company::where('code','SMI')->first();

        $user3 = User::where('email','executive2@gmail.com')->first();
        Employee::create([
            'id'=>(string) Str::orderedUuid(),
            'email'=>'executive@gmail.com',
            'name'=>'Benny Eko Willyanto 2',
            'phone'=>'5678909',
            'citizen_id'=>'345689856',
            'position'=>'Director',
            'status'=>'active',
            'user_id'=> $user3->id,
            'company_id'=> $company2->id,
        ]);



        $user4 = User::where('email','client2@gmail.com')->first();
        Employee::create([
            'id'=>(string) Str::orderedUuid(),
            'email'=>'client2@gmail.com',
            'name'=>'Dina Lestari 2',
            'phone'=>'5678909',
            'citizen_id'=>'345689856',
            'position'=>'Director',
            'status'=>'active',
            'user_id'=> $user4->id,
            'company_id'=> $company2->id,
        ]);
    }
}
