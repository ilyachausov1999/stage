<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseItemTest
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $course_id
 */
class CourseItemTest extends Model
{

    public $table = 'tests';
    protected $fillable =
    [
        'name',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
