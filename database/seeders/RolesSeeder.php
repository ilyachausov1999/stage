<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
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
                'name' => 'admin'
            ],
            [
                'name' => 'user'
            ],
            [
                'name' => 'student'
            ],
            [
                'name' => 'teacher'
            ],

        ];

        DB::table('roles')->insert($data);
    }

}
