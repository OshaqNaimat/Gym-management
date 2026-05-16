<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardioLog extends Model
{
    protected $fillable = [
        'user_id',
        'exercise_type',
        'duration',
        'distance',
        'calories',
        'notes',
        'logged_at',
    ];

    protected $casts = [
        'logged_at' => 'date',
    ];

    // Relationship — belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // MET values for calorie calculation
    public static function metValue(string $exercise): float
    {
        return match($exercise) {
            'Running'   => 9.8,
            'Cycling'   => 7.5,
            'Treadmill' => 8.0,
            'Skipping'  => 11.0,
            'Walking'   => 3.5,
            default     => 6.0,
        };
    }

    // Calculate calories
    public static function calculateCalories(string $exercise, int $duration, float $weight): float
    {
        $met = self::metValue($exercise);
        return round($met * $weight * ($duration / 60), 1);
    }
}
