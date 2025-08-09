<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "address_id",
        "trx_id",
        "subtotal",
        "shipping_cost",
        "total_cost",
        "status",
        "payment_method",
        "payment_name",
        "payment_va",
        "payment_ewallet",
        "shipping_service",
        "shipping_resi",
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
