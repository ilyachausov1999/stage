<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Users
 * @package App\Models
 * @property string $login
 * @property string $surname
 * @property string $name
 * @property string $birthdate
 * @property string $email
 * @property string $table
 * @property string $password
 * @property string $role_id
 *
 */
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
//
    public function role(): BelongsTo
    {
        return $this->belongsTo(Roles::class);
    }
}
