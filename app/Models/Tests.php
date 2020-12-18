<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
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
}
