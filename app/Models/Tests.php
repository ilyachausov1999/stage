<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tests
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $course_id
 */
class Tests extends Model
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

    public function questions()
    {
        return $this->hasMany(Questions::class, 'test_id');
    }
}
