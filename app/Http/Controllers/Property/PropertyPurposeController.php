<?php

namespace App\Http\Controllers\Property;

use App\Models\Purpose;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyPurposeController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index()
    {
        $purpose = Purpose::all();
        return $purpose;
    }
}
