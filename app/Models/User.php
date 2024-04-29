<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Phone',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function image() {
        return $this->hasOne(images::class , 'user_id');
    }

    public function depanneur()
    {
        return $this->hasOne(Depanneur::class , 'user_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class , 'user_id');
    }

    public function location() {
        return $this->hasOne(Location::class);
    }



    public function answer_ticket() {
        return $this->hasMany(User::class , 'replyer');
    }
}
