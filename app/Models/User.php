<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's balance.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function balance(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->transactions->sum('amount'),
        );
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function talks()
    {
        return $this->hasMany(Talk::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function receivesBroadcastNotificationsOn(): string
    {
        return 'notifications.' . $this->id;
    }
}
