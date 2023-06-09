<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true), // Generate a random name consisting of 3 words
            'code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'), // Generate a unique code in the format of AAA111
        ];
    }
}
