<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_appointements extends Model
{
    use HasFactory;


    public function depanneur()
    {
        return $this->belongsTo(Depanneur::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
