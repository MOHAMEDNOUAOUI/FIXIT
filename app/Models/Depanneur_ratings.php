<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depanneur_ratings extends Model
{
    use HasFactory;


    protected $fillable = [
        'depanneur_id',
        'client_id',
        'stars',
    ];


    public function clientrate() {
        return $this->belongsTo(Client::class , 'client_id');
    }

    public function depanneurrate() {
        return $this->belongsTo(Depanneur::class , 'depanneur_id');
    }
}
