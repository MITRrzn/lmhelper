<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = ['department_number', 'name'];

    public function orders()
    {
        return $this->belongsTo('App\Models\orders');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\products');
    }
}
