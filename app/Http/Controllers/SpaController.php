<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormValidation;

class SpaController extends Controller
{
    //use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterFormValidation $request)
    {

        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }
}
