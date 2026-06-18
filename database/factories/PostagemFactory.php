<?php

namespace Database\Factories;

use App\Models\Postagem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Postagem>
 */
class PostagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */   
      protected $model = Postagem::class;
    public function definition(): array
    {
        return [
         
'titulo' => fake()->text(50),
'texto' => fake()->paragraph(),
'autor' => fake()->name(),
'categoria_id' => fake()->numberBetween(1, 10),
   
       
          
        
        ];
    }
}
