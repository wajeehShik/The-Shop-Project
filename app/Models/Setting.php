<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'logo',
        'description',
        'phone_number',
        'facebook',
        'twiter',
        'instagram',
        'skyp',
        'gmail',
        'whatsapp',
    ];
}
