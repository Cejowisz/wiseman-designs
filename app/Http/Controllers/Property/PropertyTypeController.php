<?php

namespace App\Http\Controllers\Property;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index()
    {
        $types = Type::all();
        return $types;
    }
}
