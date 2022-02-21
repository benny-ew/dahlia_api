<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Organization\Models\Company;
use Illuminate\Support\Str;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'id'=>(string) Str::orderedUuid(),
            'code'=>'SMT',
            'name'=>'Simetris Multiguna Teknologi, CV',
            'npwp'=>'1234.45.66-56',
            'address'=>'Jl Bougenvillea VI blok B 18 Kavling Sukarapih Ciomas Bogor',
            'representative_name'=>'Benny Eko Willyanto',
            'representative_position'=>'Director'
        ]);

        Company::create([
            'id'=>(string) Str::orderedUuid(),
            'code'=>'SMI',
            'name'=>'Simetris Multiguna Informatika, CV',
            'npwp'=>'1234.45.66-56',
            'address'=>'Jl Bougenvillea VI blok B 18 Kavling Sukarapih Ciomas Bogor',
            'representative_name'=>'Benny Eko Willyanto',
            'representative_position'=>'Director'
        ]);
    }
}
