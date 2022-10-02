<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->insert([
            'name' => 'Pine',
        ]);
        DB::table('species')->insert([
            'name' => 'Spruce',
        ]);
        DB::table('species')->insert([
            'name' => 'Fir',
        ]);
        DB::table('species')->insert([
            'name' => 'Birch',
        ]);
        DB::table('species')->insert([
            'name' => 'Apple Tree',
        ]);
    }
}
