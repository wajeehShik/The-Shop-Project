<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Brand extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
        'image',
        'status',
        'admin_id',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    public function products(){
        return $this->hasMany(Product::class);
    }

    
    
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('assets/brands/'. $this->image);
    }
    public function getStatusDataAttribute(){
       return  $this->status=="1"?'مفعل':'غير مفعل' ;
    }
}
