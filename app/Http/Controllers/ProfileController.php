<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\MetaData;

class ProfileController extends Controller
{
    // public function index(){
    //     $metaData = MetaData::all();
    //     return view('inputdosen.profiledosen', compact('metaData'));
    // }

    // public function showProfileData(){
    //     $user = Auth::user();

    //     return view('inputdosen.profiledosen', ['user' => $user]);
    // }

    public function updateProfile(Request $request) {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nidn' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|nullable|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mengambil user yang sedang login
        $user = Auth::user();

        // Menghapus foto lama jika ada
        if ($request->hasFile('profile_picture')) {
            // Menyimpan foto profile yang baru
            $fotoPath = $request->file('profile_picture')->store('profile_picture', 'public');
            $user->profile_picture = $fotoPath;
        }

        // Mengupdate informasi user
        $user->nidn = $request->nidn;
        $user->username = $request->username;
        $user->email = $request->email;

        // Mengupdate password jika diberikan
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Menyimpan perubahan pada model
        $user->save();

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }



}
