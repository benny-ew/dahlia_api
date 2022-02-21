<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Modules\Organization\Models\Account;
use App\Modules\Organization\Models\Company;
use App\Modules\Organization\Models\BankAccount;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $bankAccount = BankAccount::where('account_number','124-837-000')->first();
        $company = Company::where('code','SMT')->first();

        Account::create([
            'id'=>(string) Str::orderedUuid(),
            'status'=>'active',
            'bank_account_id'=>$bankAccount->id,
            'company_id'=>$company->id,
            'balance'=>0.00
        ]);

        $bankAccount2 = BankAccount::where('account_number','123.456.789')->first();
        $company2 = Company::where('code','SMI')->first();

        Account::create([
            'id'=>(string) Str::orderedUuid(),
            'status'=>'active',
            'bank_account_id'=>$bankAccount2->id,
            'company_id'=>$company2->id,
            'balance'=>0.00
        ]);
        
    }
}
