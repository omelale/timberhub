<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nordicBlueOptions = ['A1', 'A2', 'A3', 'A4', 'B'];
        $tegernseerOptions = ['0', '1', '2', '3', '4', '5'];
        $tegernseer = \App\Models\Grade::where('name', 'Tegernseer')->first();
        $nordicBlue = \App\Models\Grade::where('name', 'Nordic Blue')->first();
        foreach ($nordicBlueOptions as $option) {
            $nordicBlue->gradeOptions()->create([
                'name' => $option,
            ]);
        }
        foreach ($tegernseerOptions as $option) {
            $tegernseer->gradeOptions()->create([
                'name' => $option,
            ]);
        }
    }
}
