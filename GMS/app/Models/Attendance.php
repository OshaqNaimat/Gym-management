<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     protected $fillable = ['user_id', 'date', 'status', 'time_in'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
