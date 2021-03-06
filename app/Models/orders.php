<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'customer_name', 'customer_phone', 'shipment_num',
        'status', 'inner_order', 'departmentID', 'note'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\products');
    }
    public function statuses()
    {
        return $this->hasOne('App\Models\statuses');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\departments');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
