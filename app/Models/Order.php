<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(OrderPaymentMethod::class);
    }

    public function customerAddress()
    {
        return $this->belongsTo(CustomerAddress::class);
    }
}
