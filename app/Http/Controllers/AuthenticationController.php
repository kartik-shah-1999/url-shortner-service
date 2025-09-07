<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Company;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function registerUser(RegistrationRequest $request){
        if(!$request->_token){
            abort(401, 'Unauthorized action.');
        }
        if($request->password1 === $request->password2){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password1),   
                'role' => $request->role    
            ]);
            Auth::login($user);
            return redirect()->route('dashboard');
        }
    }

    public function loginUser(LoginRequest $request){
        if(!$request->_token){
            abort(401, 'Unauthorized action.');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
        return redirect('login')->with('loginError', 'Invalid credentials. Please try again.');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['redirect' => '/login']);
    }

    public function dashboard(){
        if((int)Auth::user()->role === 1){
            $companies = Company::all();
        }else{
            $companies = Company::where('owner_id',Auth::id())->get();
        }
        return view('authentication.dashboard')->with('companies',$companies);
    }
}
