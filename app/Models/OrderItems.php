<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'image',
        'link',
        'country',
        'size',
        'color',
        'qty',
        'description',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
