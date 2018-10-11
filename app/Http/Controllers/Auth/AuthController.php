<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use JWTAuth;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\UserTrait;
use App\Jobs\SendVerificationEmail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
//    use UserTrait;

//    public function __construct() {
//        $this->middleware('auth:api', ['except' => ['login']]);
//    }

    public function user() {
        $user = JWTAuth::parseToken()->toUser();
        return $user;
    }

    public function register(Request $request) {
        $this->validate($request, [
            'fullname' => 'required|string|max:60',
            'email' => 'required|string|email|max:55|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:6'
        ]);

        $user_data = $request->only('fullname', 'email', 'password', 'phone');
        $emailToken = bcrypt($user_data['email']);
        try {
            $user_data['password'] = bcrypt($user_data['password']);
            $user = User::create($user_data);

            VerifyUser::create([
                'user_id' => $user->id,
                'token' => $emailToken
            ]);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'Error creating user: ' . $e->getMessage()], 401);
        }
//        dispatch(new SendVerificationEmail($user)); TODO: Uncomment later
        $token = JWTAuth::fromUser($user);
        return response()->json([
            'token' => $token
        ], 201);
    }


    public function login() {
        $credentials = request(['email', 'password']);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ], 200);
    }


    /*public function me() {
        return response()->json(auth()->user());
    }*/


    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);

        // Or

        /*public function logout()
        {
            JWTAuth::invalidate();
            return response([
                'status' => 'success',
                'msg' => 'Logged out Successfully.'
            ], 200);
        }*/
    }


    public function refresh(Request $request) {

        try {
            $newToken = JWTAuth::refresh(substr($request->header('Authorization'), 7));
            return $newToken;
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 500);
        }

    }


    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function verifyEmail(Request $request)
    {
        $verifyUser = VerifyUser::where('token', $request->emailToken)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return response()->json([
                'feedback' => 'Sorry your email cannot be identified.'
            ], 401);
        }

        return response()->json([
            'feedback' => $status
        ], 201);
    }

    public function checkEmail(Request $request)
    {
        return User::select('email')->where('email', $request->email)->first();
    }
}