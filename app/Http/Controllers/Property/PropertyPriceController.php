<?php

namespace App\Http\Controllers\Property;

use App\Models\PropertyPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyPriceController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required|',
            'duration' => 'required|max:40',
            'propertyId' => 'required|integer'
        ]);

        $property = new PropertyPrice;
        $property->price = $request->price;
        $property->duration = $request->duration;
        $property->property_id = $request->propertyId;
        if($property->save()) {
            return response($property);
        }
        return response('failed to save', 500);
    }
}
