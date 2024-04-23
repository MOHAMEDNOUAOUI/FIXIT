<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_appointements extends Model
{
    use HasFactory;


    protected $fillable = [
        'client_id',
        'depanneur_id',
        'service_type',
    ];


    public function depanneur()
    {
        return $this->belongsTo(Depanneur::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
