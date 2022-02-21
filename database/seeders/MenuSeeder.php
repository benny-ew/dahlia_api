<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        DB::table('menus')->insert(
            [
                "_name"=> 'CSidebarNavItem',
                "name"=> 'Dashboard',
                "to"=> '/dashboard',
                "icon"=> 'cil-chart-pie',
                'permission'=>'dashboard',
                'is_top'=>true,
                'position'=>4,
            ]
        );
    

        DB::table('menus')->insert(
            [
                "_name"=> 'CSidebarNavItem',
                "name"=> 'Company data',
                "to"=> '/company/view',
                "icon"=> 'cil-chart',
                'permission'=>'view_company',
                'is_top'=>false,
                'position'=>10,
                'nav_title'=>'Company',
            ]
        );

        DB::table('menus')->insert(
            [
                "_name"=> 'CSidebarNavItem',
                "name"=> 'Company data',
                "to"=> '/company/view',
                "icon"=> 'cil-chart',
                'permission'=>'view_company',
                'is_top'=>false,
                'position'=>11,
                'nav_title'=>'Company',
            ]
        );
        
    }
}
