<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    public function logins()
    {
        return $this->hasMany(\App\Models\Login::class);
    }

    // public function scopeWithLastLoginAt($query)
    // {
    //     $query->addSelect(['last_login_at' => \App\Models\Login::query()
    //         ->select('created_at')
    //         ->whereColumn('user_id', 'users.id')
    //         ->latest()
    //         ->take(1)
    //     ])->withCasts(['last_login_at' => 'datetime']);
    // }

}
