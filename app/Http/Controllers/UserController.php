<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'logout', 'search', 'show', 'edit', 'update']);
    }
    
    public function index()
    {
        $users = User::get();
        $repository = new UserRepository();
        $totalPosts = $repository -> getTotalPosts();
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
    
    public function show()
    {
        
        $user = auth()->user();
        
        $posts = $user->posts()->latest()->take(10)->get();
        
        $comments = $user->comments()->latest()->take(10)->get();

        // dd($comments->toArray());
        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments
        ]);
    }
    
    public function edit()
    {
        return view('users.edit');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        
        $user = auth()->user();
        
        $user->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'), 
            'password' => bcrypt($request->input('password'))
        ]);
        
        return redirect()->route('users.profile');
    }
}
