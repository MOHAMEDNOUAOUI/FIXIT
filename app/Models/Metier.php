<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'Metier',
    ];


    public function Depanneur() {
        return $this->belongsToMany(Depanneur::class , 'metier_user');
    }
}
