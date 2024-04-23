<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_metier extends Model
{
    use HasFactory;



    public function metier() {
        return $this->belongsTo(Metier::class  , 'Metier_id');
    }
}
