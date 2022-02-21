<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Modules\Auth\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'=>(string) Str::orderedUuid(),
            'name'=>'Benny Willyanto',
            'email'=>'benny.ew@gmail.com',
            'password'=>bcrypt('123456'),
            'active'=>true,
            'email_verified_at'=>now()
        ])->assignRole('admin');

        User::create([
            'id'=>(string) Str::orderedUuid(),
            'name'=>'Operator 1',
            'email'=>'operator@gmail.com',
            'password'=>bcrypt('123456'),
            'active'=>true,
            'email_verified_at'=>now()
        ])->assignRole('operator');

        User::create([
            'id'=>(string) Str::orderedUuid(),
            'name'=>'Client 1',
            'email'=>'client@gmail.com',
            'password'=>bcrypt('123456'),
            'active'=>true,
            'email_verified_at'=>now()
        ])->assignRole('client_operator');

        User::create([
            'id'=>(string) Str::orderedUuid(),
            'name'=>'Client Executive 1',
            'email'=>'executive@gmail.com',
            'password'=>bcrypt('123456'),
            'active'=>true,
            'email_verified_at'=>now()
        ])->assignRole('client_executive');

        
        User::create([
            'id'=>(string) Str::orderedUuid(),
            'name'=>'Client 2',
            'email'=>'client2@gmail.com',
            'password'=>bcrypt('123456'),
            'active'=>true,
            'email_verified_at'=>now()
        ])->assignRole('client_operator');

        User::create([
            'id'=>(string) Str::orderedUuid(),
            'name'=>'Client Executive 2',
            'email'=>'executive2@gmail.com',
            'password'=>bcrypt('123456'),
            'active'=>true,
            'email_verified_at'=>now()
        ])->assignRole('client_executive');
    }
}
