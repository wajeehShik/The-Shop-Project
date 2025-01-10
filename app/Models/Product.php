<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory,Sluggable;
    protected $fillable=[
        'title',
        'slug',
        'image',
        'content',
        'description',
        'price',
        'quantity',
        'status',
        'admin_id',
        'category_id',
        'brand_id',
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags')->withTimestamps();
    }
    
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

  public function discount()  {
     return $this->hasOne(Discount::class);
  } 
  
  public function rattings()
  {
      return $this->hasMany(Ratting::class,'product_id','id');
  }

  public function orderItems(){
    return $this->hasMany(OrderItem::class);
}
    public function getImageUrlAttribute()
    {
        
        if (!$this->image) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('assets/products/'. $this->image);
    }
    public function getStatusDataAttribute(){
        return $this->status=='1' ? 'مفعل':'غير مفعل';
    }

    public function  getProductRattingAttribute(){
        $rattingsCount=$this->rattings->where('status','1')->count();

        if($rattingsCount>0){
            $ratting= ceil($this->rattings->where('status','1')->sum(function($item) {
                return $item->ratting;
              })/$rattingsCount);
        }else{
            $ratting=0;
        }
          return $ratting;
    }


    ///to discount
    public function getDiscountDataAttribute(){
        $price=$this->price;
        $totalPrice=0;
        $date_now=date_format(date_create(), "Y-m-d H-i-s");
     
        if($this->discount()->where('start_date','<=',$date_now)->where('exipre_date','>',$date_now)
         ->count()>0){
            if($this->discount->discound_type=='fixied'){
            $totalPrice=$price-$this->discount->discount;
         }else if($this->discount->discound_type=='precent'){
            $totalPrice=$price-(($this->discount->discount*$price)/100);
         }
        }else{
            return $price;
        }
        return $totalPrice;
    }
}
