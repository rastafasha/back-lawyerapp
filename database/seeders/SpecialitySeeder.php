<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            ['title' => 'Derecho Civil', 'description' => 'Especialidad en Derecho Civil', 'is_active' => true, 'isFeatured' => false],
            ['title' => 'Derecho Penal', 'description' => 'Especialidad en Derecho Penal', 'is_active' => true, 'isFeatured' => false],
            ['title' => 'Derecho Laboral', 'description' => 'Especialidad en Derecho Laboral', 'is_active' => true, 'isFeatured' => false],
            ['title' => 'Derecho Mercantil', 'description' => 'Especialidad en Derecho Mercantil', 'is_active' => true, 'isFeatured' => false],
            ['title' => 'Derecho Administrativo', 'description' => 'Especialidad en Derecho Administrativo', 'is_active' => true, 'isFeatured' => false],
        ];

        DB::table('specialities')->insert($specialities);
    }
}
