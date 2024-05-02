<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function __invoke(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        Auth::attempt($request->only(['email', 'password']));

        $request->session()->regenerate();

        return redirect()->route('home')->with('toast', 'Register successful');
    }

}
