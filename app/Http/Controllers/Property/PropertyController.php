<?php

namespace App\Http\Controllers\Property;

use Illuminate\Http\Request;
use App\Http\Controllers\UserTrait;
use App\Http\Controllers\Controller;

use JWTAuth;
use Validator;
use App\Models\Property;

class PropertyController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }
//    use UserTrait;

    public function user() {
        $user = JWTAuth::parseToken()->toUser();
        return $user;
    }

    public function index()
    {
        $properties = Property::with('user', 'propertyDescription', 'propertyPhoto')->get();
        return $properties;
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return $property;
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'state' => 'required|string|max:60',
            'lga' => 'required|string|max:20',
            'street' => 'required|string|max:100',
            'busStop' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $property = new Property;
        $property->state = $request->state;
        $property->bus_stop = $request->busStop;
        $property->lga = $request->lga;
        $property->street = $request->street;
        $property->user_id = $this->user()->id;

        try {
            $property->save();
            return $property;
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return $this->index();
    }
}
