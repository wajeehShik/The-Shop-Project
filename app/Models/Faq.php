<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'id', 'admin_id', 'status'];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function getStatusDataAttribute(){
        return $this->status=="1"?'مفعل':'غير مفعل';
    }
}
