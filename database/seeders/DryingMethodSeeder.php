<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DryingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drying_methods')->insert([
            'name' => 'Fresh',
        ]);
        DB::table('drying_methods')->insert([
            'name' => 'Air Dried',
        ]);
        DB::table('drying_methods')->insert([
            'name' => 'Kiln Dried',
        ]);
    }
}
