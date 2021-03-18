<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statuses extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $fillable = ['status_value'];

    public function orders()
    {
        return $this->belongsTo('App\Models\orders');
    }
}
