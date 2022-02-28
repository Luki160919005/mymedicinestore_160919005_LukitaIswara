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
            'generic_name' => 'fentanil',
            'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
            'forms' => 'inj 0,05 mg/mL (i.m./i.v.)',
            'restriction_formula' => '5 amp/kasus.',
            'description' => ' inj: Hanya untuk nyeri berat dan
            harus diberikan oleh tim medis
            yang dapat melakukan
            resusitasi.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 1
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'hidromorfon',
            'form' => 'tab lepas lambat 8 mg',
            'forms' => 'tab lepas lambat 8 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => ' ',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 1
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'kodein',
            'form' => 'tab 10 mg',
            'forms' => 'tab 10 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 1
    
        ]);

        //----------------------------------------

        DB::table('medicines')->insert([
            'generic_name' => 'bupivakain',
            'form' => 'inj 0,5%',
            'forms' => 'inj 0,5%',
            'restriction_formula' => '',
            'description' => ' ',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 2
    
        ]);


        DB::table('medicines')->insert([
            'generic_name' => 'etil klorida',
            'form' => 'spray 100 mL',
            'forms' => 'spray 100 mL',
            'restriction_formula' => '',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 2
    
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'ropivakain',
            'form' => 'inj 7,5 mg/mL',
            'forms' => 'inj 7,5 mg/mL',
            'restriction_formula' => '',
            'description' => ' ',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 2
    
        ]);

        //----------------------------------------

        DB::table('medicines')->insert([
            'generic_name' => 'deksametason',
            'form' => 'inj 5 mg/mL',
            'forms' => 'inj 5 mg/mL',
            'restriction_formula' => '20 mg/hari.',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'difenhidramin',
            'form' => 'inj 10 mg/mL (i.v./i.m.) ',
            'forms' => 'inj 10 mg/mL (i.v./i.m.) ',
            'restriction_formula' => '30 mg/hari.',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'klorfeniramin',
            'form' => 'tab 4 mg',
            'forms' => 'tab 4 mg',
            'restriction_formula' => '3 tab/hari, maks 5 hari.',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3
    
        ]);

        //----------------------------------------
        
        DB::table('medicines')->insert([
            'generic_name' => 'atropin',
            'form' => 'tab 0,5 mg',
            'forms' => 'tab 0,5 mg',
            'restriction_formula' => ' ',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'efedrin',
            'form' => 'inj 50 mg/mL',
            'forms' => 'inj 50 mg/mL',
            'restriction_formula' => ' ',
            'description' => ' ',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'nalokson',
            'form' => 'inj 0,4 mg/mL',
            'forms' => 'inj 0,4 mg/mL',
            'restriction_formula' => ' ',
            'description' => 'Hanya untuk mengatasi depresi
            pernapasan akibat morfin atau
            opioid.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4
    
        ]);

        //----------------------------------------


        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => '	
            inj 5 mg/mL',
            'forms' => '	
            inj 5 mg/mL',
            'restriction_formula' => '10 amp/kasus,
            kecuali untuk kasus
            di ICU',
            'description' => 'Tidak untuk i.m',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 5
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'fenobarbital',
            'form' => 'tab 30 mg',
            'forms' => 'tab 30 mg',
            'restriction_formula' => '120 tab/bulan.',
            'description' => '',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 5
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'levetirasetam',
            'form' => 'tab 250 mg',
            'forms' => 'tab 250 mg',
            'restriction_formula' => '60 tab/bulan.',
            'description' => 'Sebagai terapi tambahan pada pasien
            epilepsi onset parsial',
            'faskes_tk1' => 0,
            'faskes_tk2' => 0,
            'faskes_tk3' => 1,
            'category_id' => 5
    
        ]);

        //----------------------------------------
        DB::table('medicines')->insert([
            'generic_name' => 'albendazol',
            'form' => 'tab 400 mg',
            'forms' => 'tab 400 mg',
            'restriction_formula' => ' ',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 6
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'mebendazol',
            'form' => 'tab 100 mg',
            'forms' => 'tab 100 mg',
            'restriction_formula' => ' ',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 6
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'pirantel pamoat',
            'form' => 'tab 125mg' ,
            'forms' => 'tab 125 mg',
            'restriction_formula' => ' ',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 6
    
        ]);

        //----------------------------------------
        DB::table('medicines')->insert([
            'generic_name' => 'ergotamin',
            'form' => 'tab 1 mg',
            'forms' => 'tab 1 mg',
            'restriction_formula' => '8 tab/minggu',
            'description' => 'Hanya digunakan untuk serangan
            migren akut dan cluster headache',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 7
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'propranolol',
            'form' => 'tab 10 mg',
            'forms' => 'tab 10 mg',
            'restriction_formula' => ' ',
            'description' => ' ',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 7
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'dienogest',
            'form' => 'tab 6 mg',
            'forms' => 'tab 6 mg',
            'restriction_formula' => 'Untuk vertigo perifer:
                - BPPV: 1 minggu.
                - non BPPV: 30
                tab/bulan.',
            'description' => 'Hanya untuk sindrom
            meniere atau vertigo perifer.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 7
    
        ]);
        

        //----------------------------------------
        DB::table('medicines')->insert([
            'generic_name' => 'anastrozol',
            'form' => 'tab 1 mg',
            'forms' => 'tab 1 mg',
            'restriction_formula' => '30 tab/bulan.',
            'description' => 'Dapat digunakan untuk kanker
            payudara post menopause dengan
            pemeriksaan reseptor
            estrogen/progesteron positif.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 0,
            'faskes_tk3' => 1,
            'category_id' => 8
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'deksametason',
            'form' => 'tab 0,5 mg',
            'forms' => 'tab 0,5 mg',
            'restriction_formula' => '',
            'description' => '',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 8
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'dienogest',
            'form' => 'tab 2 mg',
            'forms' => 'tab 2 mg',
            'restriction_formula' => '30 tab/bulan selama
            maks 6 bulan.',
            'description' => 'Hanya untuk endometriosis.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 8
    
        ]);


        //----------------------------------------
        DB::table('medicines')->insert([
            'generic_name' => 'pramipeksol',
            'form' => 'tab 0,125 mg',
            'forms' => 'tab 0,125 mg',
            'restriction_formula' => '60 tab/bulan',
            'description' => 'Hanya diresepkan oleh dokter
            spesialis neurologi..',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 9
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'ropinirol',
            'form' => 'tab lepas lambat 4 mg',
            'forms' => 'tab lepas lambat 4 mg',
            'restriction_formula' => '30 tab/bulan',
            'description' => 'Hanya diresepkan oleh dokter
            spesialis neurologi.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 9
    
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'triheksifenidil',
            'form' => 'tab 2 mg',
            'forms' => 'tab 2 mg',
            'restriction_formula' => '90 tab/bulan.',
            'description' => 'Dapat digunakan pada gangguan
            ekstrapiramidal karena obat.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 9
    
        ]);

        //----------------------------------------
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
