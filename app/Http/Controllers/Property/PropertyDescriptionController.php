<?php

namespace App\Http\Controllers\Property;

use App\Models\PropertyDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyDescriptionController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'purpose' => 'required|max:100',
            'use' => 'required|max:100',
            'type' => 'required|max:100',
            'bedrooms' => 'integer|nullable',
            'bathrooms' => 'integer|nullable',
            'toilets' => 'integer|nullable',
            'propertyId' => 'required'
        ]);

        $property = new PropertyDescription;
        $property->title = $request->title;
        $property->purpose = $request->purpose;
        $property->use = $request->use;
        $property->type = $request->type;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->toilets = $request->toilets;
        $property->property_id = $request->propertyId;

        try {
            $property->save();
            return $property;
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
