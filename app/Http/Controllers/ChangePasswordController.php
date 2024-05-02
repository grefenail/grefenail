<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchCurrentPassword;


class ChangePasswordController extends Controller
{
    function forgetPassword(){
        return inertia('Profile/ForgetPassword');
    }

    function forgetPasswordPost(Request $request){  
        $request->validate([
            'email'=> "required|email|exists:users",
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email'=> $request->email,
            'token'=> $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.ForgetPassword",['token' => $token], function($message) use ($request){
            $message->to($request->email)->subject("Reset Password");
        });

        return redirect()->to(route("forget.password"))->with("success","We have send an email to reset password");

    }

    function resetPassword($token){
        return inertia("Profile/NewPassword", ['token' => $token]);
    }
    
    function resetPasswordPost(Request $request){
        dump("Hello, world");
        echo "Hello World";
 
        $request->validate([
            'email'=> "required|email|exists:users",
            'password' => "required|confirmed",
            'password_confirmation' => "required"
        ]);

        // Print out the request data for debugging
        dump($request->all());
        echo "Hello World";

        $updatePassword = DB::table('password_reset_tokens')->where([
            'email'=> $request->email,
            'token'=> $request->token,
        ])->first();

        // Print out the result of the query for debugging
        dump($updatePassword);

        if(!$updatePassword){
            return redirect()->to(route('reset.password'))->with('error','Invalid');
        }
         
        //update query
        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where([
            'email'=> $request->email,
        ])->delete();

        // return redirect()->to(route('home'))->with('success','Password reste success');
        return redirect()->route('app.login'); 
        // return inertia("Profile/NewPassword", ['token' => $token]);
    }

    function updatePassword(){
        return inertia("Profile/Partials/UpdatePasswordSettings");
    }

    function updatePasswordPost(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', new MatchCurrentPassword],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ], [
            'current_password.required' => 'The current password field is required.',
            'password.required' => 'The new password field is required.',
            'password_confirmation.required' => 'The password confirmation field is required.',
            'password.confirmed' => 'The new password and confirmation must match.',
        ]);

        User::where('email', $user->email)->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with('success', 'Password successfully updated');
    }
}
