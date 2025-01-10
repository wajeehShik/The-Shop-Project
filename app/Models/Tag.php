<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'admin_id', 'status'];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    public function posts()
    {
        return $this->belongsToMany(Product::class, 'products_tags')->withTimestamps();
    }
    public function getStatusDataAttribute(){
      return  $this->status=='1'?'مفعل':'غير مفعل' ;
    }
}
