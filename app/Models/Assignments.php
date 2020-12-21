<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Assignments extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'courses_id'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'assignments',
            'courses_id','users_id')
            ->withTimestamps()
            ->as('assign');
    }

    public function courses()
    {


    }
}
