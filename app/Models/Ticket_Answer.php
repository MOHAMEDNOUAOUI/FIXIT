<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket',
        'replyer',
        'answer',
    ];


    public function ticket() {
        return $this->belongsTo(Ticket::class , 'ticket');
    }

    public function user() {
        return $this->belongsTo(User::class , 'replyer');
    }
}
