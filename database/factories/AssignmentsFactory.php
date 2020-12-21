<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\Users;
use App\Models\Assignments;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $coursesId = Courses::query()->get()->pluck('id');
        $usersId = Users::query()->where('name', '!=' ,'admin')->get()->pluck('id');


        return [
            'users_id' => $usersId[rand(0, count($usersId) - 1)],
            'courses_id' => $coursesId[rand(0, count($coursesId) - 1)],
        ];
    }
}
