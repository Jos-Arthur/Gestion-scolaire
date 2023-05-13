<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Province extends Authenticatable
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
        'chef_lieu',
        'commentaire',
        'deleted'        
    ];

    public function region()
    {
        return $this->belongsTo('App\Models\Region','region_id');
    }


     protected $casts = [
        'created_at'=>'date:d-m-Y'
    ];
}
