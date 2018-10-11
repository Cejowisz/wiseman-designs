<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    protected $table = 'business_details';

    protected $fillable = [
        'title',
        'description',
        'registered',
        'logo_path',
        'featured_picture_path',
        'user_id'
    ];
}
