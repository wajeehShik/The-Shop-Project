<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'price',
        'qunatity',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
