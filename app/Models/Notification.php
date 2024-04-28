<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;


    protected $fillable = [
        'reciever',
        'sender',
        'message',
    ];

    public function recievernot() {
        return $this->belongsTo(user::class , 'reciever');
    }


    public function sendernot() {
        return $this->belongsTo(user::class , 'sender');
    }
    

}
