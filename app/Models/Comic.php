<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    //passo questi parametri o meglio chiavi che non devono essere 
    protected $fillable = ["name", "description", "price", "available", "img"];
}