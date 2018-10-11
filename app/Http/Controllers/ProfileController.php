<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class ProfileController extends Controller
{
    public function getThisUser() {
        $user = JWTAuth::parseToken()->toUser();
        return $user;
    }
}
