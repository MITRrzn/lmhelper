<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Grout extends Model
{
    use HasFactory;

    
    protected $table = 'grouts';
    protected $fillable = ['article', 'name', 'color', 'img_pth', 'show'];
}
