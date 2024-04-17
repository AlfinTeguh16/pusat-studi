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
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'foto_profile' => 'image|mimes:jpeg,png,jpg,gif|nullable|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mengambil user yang sedang login
        $user = Auth::user();

        // Menghapus foto lama jika ada
        if ($request->hasFile('foto_profile')) {
            // Menyimpan foto profile yang baru
            $fotoPath = $request->file('foto_profile')->store('foto_profile', 'public');
            $user->foto_profile = $fotoPath;
        }

        // Mengupdate informasi user
        $user->nidn = $request->nidn;
        $user->nama = $request->nama;
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
