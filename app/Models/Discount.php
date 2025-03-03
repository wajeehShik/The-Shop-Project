<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=['product_id',
    'start_date',
    'exipre_date',
    'notes',
    'discound_type',
    'discount',
    'status',];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
