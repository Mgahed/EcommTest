<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
