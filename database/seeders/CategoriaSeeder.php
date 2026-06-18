<?php

namespace Database\Seeders;

use App\Models\categoria;
use Database\Factories\CategoriaFactory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categoria::factory()->count(10)->create();    
}
}
