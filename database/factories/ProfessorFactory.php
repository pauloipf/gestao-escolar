<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        return [
            'nome'         => $this->faker->name,
            'email'        => $this->faker->unique()->safeEmail,
            'password'     => Hash::make('password'),
        ];
    }
}
