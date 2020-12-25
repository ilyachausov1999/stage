<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    public $table = 'courses';
    protected $fillable =
        [
            'name',
            'image'
        ];

    public function assignments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Assignments::class, 'courses_id', 'id' );
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
