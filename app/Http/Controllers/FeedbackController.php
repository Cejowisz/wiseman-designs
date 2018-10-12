<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'nullable|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if(
        Feedback::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ])
        ) {
            return response('success', 201);
        }
        return response('error', 500);

    }
}
