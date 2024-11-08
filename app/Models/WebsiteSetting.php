<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'address',
        'map_address',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'created_at',
        'updated_at',
    ];
}
