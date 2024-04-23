<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depanneur extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
    ];


    public function metiers() {
        return $this->belongsToMany(Metier::class, 'metier_user');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function serviceAppointments()
    {
        return $this->hasMany(service_appointements::class);
    }
}
