<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id', 
        'libelle',
        'superfice', 
        'deleted',
        'created_at',
    ];

    public function region()
    {
        return $this->belongsTo('App\Models\Region','region_id');
    }



     protected $casts = [
        'created_at'=>'date:d-m-Y'
    ];
}
