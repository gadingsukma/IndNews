<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerAdvertisement extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'link',
        'is_active',
        'type',
        'thumbnail',
    ];
}
