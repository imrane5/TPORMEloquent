<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    /** @use HasFactory<\Database\Factories\StagiaireFactory> */
    
    /*use this if you are working with factories*/
    use HasFactory;
    protected $table = 'stagiaires';
    protected $fillable = ['nom', 'prenom', 'age', 'email', 'password'];
}
