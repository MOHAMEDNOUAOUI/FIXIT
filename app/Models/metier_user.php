<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class metier_user extends Model
{
    use HasFactory;


    protected $table = 'metier_user';

    protected $fillable = [
        'depanneur_id',
        'metier_id',
    ];

    public function metier() {
        return $this->belongsTo(Metier::class  , 'Metier_id');
    }


}
