<?php

namespace Andrepgsilva\LaraArrayPagination\Factories;

use Andrepgsilva\LaraArrayPagination\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class DummyElementFactory extends Factory
{
    use withFaker;

    protected $className = 'DummyElement';

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(),
        ];
    }
}