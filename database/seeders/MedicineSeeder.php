<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        DB::table('medicines')->insert([
            'generic_name' => 'asam folat',
            'form' => 'tab 0,4 mg',
            'forms' => 'tab 0,4 mg',
            'restriction_formula' => '',
            'description' => '',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 10
    
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'garam Fe',
            'form' => 'setara dengan Fe elemental 60
            mg',
            'forms' => 'setara dengan Fe elemental 60
            mg',
            'restriction_formula' => '',
            'description' => '',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 10
    
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'asam traneksamat',
            'form' => 'tab sal selaput 500 mg',
            'forms' => 'tab sal selaput 500 mg',
            'restriction_formula' => '',
            'description' => 'Untuk perdarahan masif atau
            berpotensi perdarahan > 600 cc',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 10
    
        ]);



    }
}
