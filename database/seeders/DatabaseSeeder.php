<?php

namespace Database\Seeders;

use \App\Models\CourseItems;
use Illuminate\Database\Seeder;
use function Symfony\Component\Translation\t;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(\Database\Seeders\RolesSeeder::class);
        $this->call(\Database\Seeders\AdminsSeeder::class);
        \App\Models\Users::factory(4)->create();
        $this->call(\Database\Seeders\CoursesSeeder::class);
        \App\Models\CourseItems::factory(4)->create();
        \App\Models\Assignments::factory(4)->create();

    }
}
