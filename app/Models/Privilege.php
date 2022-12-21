<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'benefits',
        'price',
        'duration',
    ];
    
    public function users(){
        return $this->hasMany('App\Models\User', 'priv_id');
    }
}
