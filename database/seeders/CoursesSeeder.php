<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'name' => 'Программирование'
            ],
            [
                'name' => 'Английский язык'
            ],
            [
                'name' => 'Дизайн'
            ],
            [
                'name' => 'Менеджмент'
            ],

        ];

        DB::table('courses')->insert($data);
    }

}
