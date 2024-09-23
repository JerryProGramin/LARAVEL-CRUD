<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'date',
        'payment_method_id',
        'total',
        'order_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // public function orderProduct()
    // {
    //     return $this->hasMany(OrderProduct::class);
    // }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('price_unit', 'quantity', 'subtotal');
    }
}

