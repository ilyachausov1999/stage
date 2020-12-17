<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CourseItemTest extends Model
{

    public $table = 'tests';
    protected $fillable =
    [
        'test_name',
        'course_id'
    ];
}
