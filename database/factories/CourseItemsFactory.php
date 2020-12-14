<?php

namespace Database\Factories;

use App\Models\CourseItems;
use App\Models\Courses;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

class CourseItemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseItems::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $coursesId = Courses::query()->get()->pluck('id');

        return [
            'description' => $this->faker->text,
            'text' => $this->faker->text,
            'course_id' => $coursesId[rand(0, count($coursesId) - 1)],
        ];
    }
}
