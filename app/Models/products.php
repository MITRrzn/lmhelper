<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['article', 'name', 'EAN', 'plant_id', 'plant_name'];

    public function orders()
    {
        return $this->belongsTo('App\Models\orders');
    }
}
