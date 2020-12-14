<?php

namespace Database\Factories;

use App\Models\Roles;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {


        $rolesIds = Roles::query()->where('name', '!=' ,'admin')->get()->pluck('id');
//        dd($rolesIds);

        return [
            'login'=> $this->faker->userName,
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'role_id' =>  $rolesIds[rand(0, count($rolesIds) - 1)],

            'remember_token' => Str::random(10),
        ];
    }
}
