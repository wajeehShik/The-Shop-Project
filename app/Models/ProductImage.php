<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'image',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return  asset('assets/related_images/' . $this->image);
        } else {
            return "";
        }
    }
    
    
    public function getImageAttribute($image)
    {
        if ($image) {
            return  asset('assets/related_images/' . $image);
        } else {
            return "";
        }
    }
}
