<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['Any','Trimestre','Codi_Districte', 'Nom_Districte', 'Codi_Barri', 'Nom_Barri', 'Lloguer_mitja','Preu'];
}
