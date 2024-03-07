<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'phone_no',
        'address',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(): Attribute {
        return Attribute::get(fn () => $this->role === 'admin');
    }

    public function experiences(): HasMany {
        return $this->hasMany(WorkExperience::class);
    }

    public function education(): HasMany {
        return $this->hasMany(Education::class);
    }

    public function projects(): HasMany {
        return $this->hasMany(Project::class);
    }

    public function references(): HasMany {
        return $this->hasMany(Reference::class);
    }

    public function resumes(): HasMany {
        return $this->hasMany(Resume::class);
    }
}
