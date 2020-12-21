<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    public $table = 'questions';
    protected $fillable =
    [
        'question',
        'image',
        'type',
        'test_id',
    ];

    public function tests()
    {
        return $this->hasMany(Tests::class, 'test_id');
    }

    public function answers()
    {
        return $this->hasMany(Answers::class, 'question_id');
    }

}
