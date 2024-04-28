<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
    ];



    public function user() {
        return $this->belongsTo(User::class);
    }


    public function serviceAppointments()
    {
        return $this->hasMany(service_appointements::class);
    }


    public function usersender () {
        return $this->hasMany(Notification::class , 'sender');
    }

    public function userreciever() {
        return $this->hasMany(Notification::class , 'reciever');
    }


    public function rating() {
        return $this->hasMany(Depanneur_ratings::class);
    }
    
}
