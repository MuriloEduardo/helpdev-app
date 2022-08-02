<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'talk_id',
        'confirmed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'confirmed' => 'boolean',
    ];

    public function talk()
    {
        return $this->belongsTo(Talk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
