<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymSetting extends Model
{
    protected $fillable = [
        'gym_name', 'email', 'phone', 'address',
        'weekday_open', 'weekday_close',
        'saturday_open', 'saturday_close',
        'sunday_open', 'sunday_close',
    ];
}
