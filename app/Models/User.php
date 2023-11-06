<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_superadmin',
        'is_active'
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
        'password' => 'hashed',
        'is_superadmin' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeSearch($query, $data)
    {
        if (isset($data['search'])) {
            $query->where('name', 'like', '%' . $data['search'] . '%')
                ->orWhere('email', 'like', '%' . $data['search'] . '%');
        }
        if (isset($data['status'])) {
            $query->where('is_active', $data['status']);
        }
        if (isset($data['start_date'])) {
            $query->where('created_at', '>=', $data['start_date']);
        }
        if (isset($data['end_date'])) {
            $query->where('created_at', '<=', $data['end_date']);
        }
        return $query;
    }
}
