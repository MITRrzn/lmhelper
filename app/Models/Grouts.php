<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouts extends Model
{
    use HasFactory;

    protected $table="grouts";
    protected $fillable = ['article', 'name', 'color', 'plant', 'show'];
}
