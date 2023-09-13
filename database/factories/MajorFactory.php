<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Major>
 */
class MajorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $major_title = ['MajorOne', 'MajorTow','MajorThree', 'MajorFour', 'MajorFive'];
        return [
            'title' => Arr::random($major_title),
            'img'   => 'major.jpg',
        ];
    }
}
