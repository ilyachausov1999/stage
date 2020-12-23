<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Assignments extends Model
{

    protected $table = 'assignments';

    use HasFactory;
    protected $fillable = [
        'id',
        'users_id',
        'courses_id'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'users_id', 'id');

    }

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'courses_id', 'id');

    }

}
