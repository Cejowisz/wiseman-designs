<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    protected $table = 'property_photos';
    protected $fillable = [
        'property_id'
    ];

    public function properties()
    {
        return $this->belongsTo('App\Models\Property');
    }

    public function photoDetails()
    {
        return $this->hasMany('App\Models\PropertyPhotoDetail', 'property_photo_id');
    }
}
