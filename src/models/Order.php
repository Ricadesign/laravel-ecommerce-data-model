<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'shipping_date' => 'date',
        'refund_deadline' => 'date',
    ];

    const STATUSES = [
        'received' => 'Received',
        'delivered' => 'Delivered',
        'refunded' => 'Refunded',
    ];
    const SHIPPING_TYPES = [
        'standard' => 'Standard',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
      return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }
}
