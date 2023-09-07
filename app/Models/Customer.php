<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($customer) {
            $customer->orders()->delete();
            // Menghapus transaksi terkait ketika pelanggan dihapus
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
