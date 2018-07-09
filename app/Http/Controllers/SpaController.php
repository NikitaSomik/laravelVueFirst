<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormValidation;
use App\User;

class SpaController extends Controller
{
    //use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index() {
        return view('main');
    }

    public function register(RegisterFormValidation $request)
    {

        $user = User::create([
           'email' => $request->email,
           'name' => $request->name,
           'password' => bcrypt($request->password)
        ]);


//        $user = new User;
//        $user->email = $request->email;
//        $user->name = $request->name;
//        $user->password = bcrypt($request->password);
//        $user->save();

        return response([
            'status' => 'success',
            'data' => $user
        ], 201);
    }
}
