<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timein extends Model
{
    protected $table = 'timein';

    protected $fillable = [
        'user_id', 'time', 'out', 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

