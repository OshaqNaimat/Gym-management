<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'plan', 'amount', 'method', 'status', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

