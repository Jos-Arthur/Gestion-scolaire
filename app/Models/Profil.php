<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'libelle',
        'commentaire', 
        'deleted',
        'created_at',
    ];


     protected $casts = [
        'created_at'=>'date:d-m-Y'
    ];
}
