<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Courses
 * @package App\Models
 * @property string $image
 */
class Courses extends Model
{
    use HasFactory;

    public $table = 'courses';

    protected $fillable =
    [
        'name', 'image'
    ];
}
