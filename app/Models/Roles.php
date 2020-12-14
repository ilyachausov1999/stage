<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Roles extends Model
{

    use HasFactory;

    protected $fillable = [

        'name',

    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
