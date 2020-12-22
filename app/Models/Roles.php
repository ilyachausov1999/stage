<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function Symfony\Component\Translation\t;

class Roles extends Model
{

    use HasFactory;

    protected $fillable = [

        'name',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
