<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,        
            CompanySeeder::class,        
            EmployeeSeeder::class,
            //SourceSeeder::class,
            //BankSeeder::class,        
            //TaxTypeSeeder::class,        
            //BankAccountSeeder::class,
            //AccountSeeder::class,
            //AccountTransactionSeeder::class,
            //TransactionSeeder::class,
            //TransactionItemSeeder::class,       
        ]);
    }
}
