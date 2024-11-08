<?php

namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Testimonial\Database\factories\TestimonialFactory::new();
    }

    public function getImageAttribute($image)
    {
        if ($image) {
            return $image;
        } else {
            return 'backend/image/default.png';
        }
    }
}
