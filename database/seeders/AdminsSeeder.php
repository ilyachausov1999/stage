<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Users::query()->upsert([
        ['login' => 'a.kudryashkin', 'name'=>'Александр', 'surname'=> 'Кудряшкин', 'email' => 'a.kudryashkin@devspark.ru', 'password'=> Hash::make('password'),'role_id' => 1, 'remember_token' => Str::random(10)],
        ['login' => 'r.kulikov', 'name'=>'Родион', 'surname'=> 'Куликов', 'email' => 'r.kulikov@devspark.ru', 'password'=> Hash::make('password'),'role_id' => 1, 'remember_token' => Str::random(10)],
        ['login' => 'i.chausov', 'name'=>'Илья', 'surname'=> 'Чаусов', 'email' => 'i.chausov@devspark.ru', 'password'=> Hash::make('password'),'role_id' => 1, 'remember_token' => Str::random(10)],
        ['login' => 'n.belik', 'name'=>'Никита', 'surname'=> 'Белик', 'email' => 'n.belik@devspark.ru', 'password'=> Hash::make('password'),'role_id' => 1, 'remember_token' => Str::random(10)],

], ['login', 'name', 'surname', 'email', 'password', 'remember_token'], ['role_id']);
    }
}
