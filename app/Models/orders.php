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
        'status', 'inner_order', 'note'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\products');
    }
}
