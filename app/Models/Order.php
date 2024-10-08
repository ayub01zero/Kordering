<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_date',
        'invoice_num',
        'status',
        'total_price',
        'qty',
        'international_fee',
        'custom_fee',
        'order_price',
        'return_days',
        'approve',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function OrderItems()
    {
        return $this->hasMany(OrderItems::class);
    }



}
