<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function signupInterface() {
        return view('auth.signup');
    }

    public function signinInterface() {
        return view('auth.signin');
    }
    
    public function signup(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);
        return redirect()->route('list');
    }

    public function signin(Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['email' => $data['email'],'password' => $data['password'] ])) {
            return redirect()->route('list');
        }

        return redirect()->route('signup');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('/');
    }
}
