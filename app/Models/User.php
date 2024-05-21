<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'email', 'password', 'name', 'datehire', 'role', 'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function timeins()
    {
        return $this->hasMany(Timein::class, 'user_id', 'user_id');
    }
}

