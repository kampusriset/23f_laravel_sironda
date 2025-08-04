<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
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
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        // Validate the request, authenticate the Petugas, etc.
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'username' => 'username atau password salah'
        ]);
    }

    public function register(Petugas $petugas)
    {
        return view('pages.auth.register', compact('petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:200|unique:petugas',
            'nama_lengkap' => 'required|string|max:200',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->only('nama_lengkap', 'username', 'password', 'slug');
        $data['password'] = bcrypt($request->password);
        $baseSlug = Str::slug($request->nama_lengkap, '-');
        $slug = $baseSlug;
        $count = 1;

        while (Petugas::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;
        Petugas::create($data);


        return redirect('/login')->with('message', 'Akun berhasil dibuat, silahkan login');
    }

    public function editProfile($slug)
    {
        $petugas = Petugas::findOrFail($slug);
        return view('pages.auth.edit', compact('petugas'));
    }

    public function updateProfile(Request $request, $slug)
    {
        $petugas = Petugas::where(['slug', $slug])->first();
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:200|unique:petugas',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->only('nama_lengkap', 'username', 'password', 'slug');
        $data['password'] = bcrypt($request->password);
        $baseSlug = Str::slug($request->nama_lengkap, '-');
        $slug = $baseSlug;
        $count = 1;

        while (Petugas::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;
        $petugas->update($data);

        return redirect('/edit-profile/'.$slug)->with('message', 'profil akun berhasil diupdate');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Kamu Berhasil Logout');
    }

}
