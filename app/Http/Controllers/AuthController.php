<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function view()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // Logic for handling login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // Validate the request, authenticate the user, etc.
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/')->with('message', 'Berhasil Login');
        }
        return back()->withErrors([
            'email' => 'email atau password salah'
        ]);
        
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($request->password);
        $baseSlug = Str::slug($request->name, '-');
        $slug = $baseSlug;
        $count = 1;

        while (User::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;
        User::create($data);

        return redirect('/login')->with('message', 'Akun berhasil dibuat, silahkan login');
    }

    public function editProfile($slug)
    {
        $user = User::findOrFail($slug);
        return view('pages.auth.edit', compact('user'));
    }

    public function updateProfile(Request $request, $slug)
    {
        $user = User::where(['slug', $slug])->first();
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->only('name', 'email', 'password', 'slug');
        $data['password'] = bcrypt($request->password);
        $baseSlug = Str::slug($request->name, '-');
        $slug = $baseSlug;
        $count = 1;

        while (User::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;
        $user->update($data);

        return redirect('/edit-profile/'.$slug)->with('message', 'profil akun berhasil diupdate');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out successfully.');
    }

}
