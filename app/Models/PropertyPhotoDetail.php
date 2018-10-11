<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPhotoDetail extends Model
{
    protected $table = 'property_photo_details';
    protected $fillable = [
        'name',
        'path',
        'is_main',
        'property_photo_id'
    ];

    public function photos()
    {
        return $this->belongsTo('App\Models\PropertyPhoto');
    }
}
