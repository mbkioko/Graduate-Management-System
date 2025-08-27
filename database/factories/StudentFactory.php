<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    return [
        'student_number' => $this->faker->unique()->numberBetween(100000, 999999),
        'program_id' => $this->faker->numberBetween(1, 20), // Adjust based on your programs
        'academic_status' => 'active',
        'year_of_admission' => $this->faker->year(),
        'year_of_registration' => $this->faker->year(),
        'year_of_graduation' => $this->faker->year(),
        'user_id' => function () {
            return User::factory()->create()->id;
        },
    ];
}

}
