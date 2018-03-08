<?php

namespace App\Api\V1\Controllers;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;

class LoginController extends Controller
{
    /**
     * Log the user in
     *
     * @param LoginRequest $request
     * @param JWTAuth $JWTAuth
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request, JWTAuth $JWTAuth)
    {
        $credentials = $request->only(['email', 'password']);

        try {
            $token = Auth::guard()->attempt($credentials);

            if(!$token) {
               return "Đăng Nhập Thất Bại!";
            }

        } catch (JWTException $e) {
            throw new HttpException(500);
        }
        // setcookie('token', $token, time() + (86400), "/"); 
        // $currentUser = JWTAuth::parseToken()->authenticate();
        // return $currentUser;
         // return Redirect::route('list');
         return response()
                ->json([
                    'status' => 'ok',
                    'token' => $token
                ]);
       
    }
}
