<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'libelle',
        'commentaire', 
        'deleted',
        'created_at',
        'updated_at'
    ];


     protected $casts = [
        'created_at'=>'date:d-m-Y',
        'updated_at'=>'date:d-m-Y',
    ];
}
