<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'libelle',
        'superfice', 
        'deleted',
        'created_at',
    ];


     protected $casts = [
        'created_at'=>'date:d-m-Y'
    ];
}
