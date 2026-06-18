<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use \App\Models\postagem;
class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $model = Postagem::class;     
    public function run(): void
    {
                Postagem::factory()->count(10)->create();    

    }
}
