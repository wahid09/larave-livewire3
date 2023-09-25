<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

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
        'password' => 'hashed',
    ];

    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = empty($date) ? Carbon::now() : Carbon::parse($date);
    }

    public function setUpdatedAtAttribute($date)
    {
        $this->attributes['updated_at'] = empty($date) ? Carbon::now() : Carbon::parse($date);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
        //return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission): bool
    {
        //dd($this->roles());
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
