<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'ANALGESIK NARKOTIK',
            'description' => ''
          
        ]);

        DB::table('categories')->insert([
            'category_name' => 'ANESTETIK LOKAL',
            'description' => ''
          
        ]);

        DB::table('categories')->insert([
            'category_name' => 'ANTIALERGI dan OBAT untuk ANAFILAKSIS',
            'description' => ''
          
        ]);





        DB::table('categories')->insert([
            'category_name' => 'ANTIDOT dan OBAT LAIN untuk KERACUNAN',
            'description' => ''
          
        ]);
        DB::table('categories')->insert([
            'category_name' => 'ANTIEPILEPSI - ANTIKONVULSI',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'ANTIINFEKSI',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'category_name' => 'ANTIMIGREN dan ANTIVERTIGO',
            'description' => ''
        ]);

        DB::table('categories')->insert([
            'category_name' => 'ANTINEOPLASTIK, IMUNOSUPRESAN dan OBAT untuk TERAPI PALIATIF',
            'description' => ''
        ]);

        DB::table('categories')->insert([
            'category_name' => 'ANTIPARKINSON',
            'description' => ''
        ]);

        DB::table('categories')->insert([
            'category_name' => 'OBAT yang MEMENGARUHI DARAH',
            'description' => ''
        ]);


       

    }
}
