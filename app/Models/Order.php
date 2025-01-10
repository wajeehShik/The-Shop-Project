<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'store_id', 'user_id', 'payment_method', 'status', 'payment_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
//يستخدم model تاع pivot
            ->using(OrderItem::class)
            //يرجع بقيمه
            ->as('order_item')
            //بدي كمان يرجع مع جدول وسيط
            ->withPivot([
                'product_name', 'price', 'quantity', 'options','is_ratting'
            ]);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

}
