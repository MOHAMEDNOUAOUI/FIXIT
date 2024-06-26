<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'Type',
        'Subject',
        'Message',
        'priorty',
    ];


    public function answer() {
        return $this->hasMany(Ticket_Answer::class , 'ticket');
    }
}
