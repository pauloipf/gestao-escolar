<?php

namespace Database\Factories;

use App\Models\Estudante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EstudanteFactory extends Factory
{
    protected $model = Estudante::class;

    public function definition()
    {
        return [
            'nome'     => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
        ];
    }
}
