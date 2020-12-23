<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseItems extends Model
{
    use HasFactory;

    public $table = 'course_items';
    protected $fillable =
        [
            'description',
            'text',
            'course_id',
            'image'
        ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
