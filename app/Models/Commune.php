<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Commune extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'direction_id',
        'libelle',
        'commentaire',
        'deleted'        
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province','province_id');
    }



     protected $casts = [
        'created_at'=>'date:d-m-Y'
    ];
}
