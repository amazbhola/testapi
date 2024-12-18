<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\UserRequest;
use App\Models\Tender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function signUp(UserRequest $request): \Illuminate\Http\JsonResponse
    {

        if($request->has('username') && $request->has('email') && $request->has('password')) {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return $this->sendResponse($user, 'success');
        } else {
            return $this->sendError('error');
        }

    }

    public function signIn(Request $request): \Illuminate\Http\JsonResponse
    {
        $validateUser = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($request->only('email', 'password'))) {
            $authUser = Auth::user();
            $data = [
                'email' => $authUser->email,
                'token' => $authUser->createToken($authUser->email)->plainTextToken,
                'token_type' => 'Bearer'
            ];

            return $this->sendResponse($data, 'login success');
        } else {

            return $this->sendError('Authentication Failed');
        }

    }

    public function signOut(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return $this->sendResponse($user, 'logout success');
    }

    public function allTenders()
    {

        $tenders = Tender::where('last_sale_date', '>', date('Y-m-d'))->get();
        return $this->sendResponse($tenders, 'success');
    }
}
