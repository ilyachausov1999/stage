<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'login',
        'name',
        'surname',
        'email',
        'birthdate',
        'password',
        'role_id',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }





}
