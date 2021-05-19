<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        
        return view('users.index', [
            'users' => $users
        ]);
    }
    
    public function register()
    {
        return view('users.register');
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('home');
    }
    
    public function login()
    {
        return view('users.login');
    }
    
    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $rememberMe = $request->input('remember_me');
        $rememberMe = $rememberMe === 'on';
        

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
    public function search(Request $request)
    {
        // Filtre envoyé par la requête ajax
        $search = $request->input('search');
        
        // Liste des utilisateurs filtrée
        $users = User::where('name', 'like', "%$search%")->get();
        
        // Affichage de la vue partielle
        return view('partials.users.index', ['users' => $users]);
    }
}
