<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        return view('inputdosen.profiledosen');
    }

    public function showProfileData(){
        $user = Auth::user();

        return view('inputdosen.profiledosen', ['user' => $user]);
    }

    public function updateProfile(Request $request){
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
        $user->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Memproses foto profile jika ada
        if ($request->hasFile('foto_profile')) {
            // Menghapus foto profile lama (jika ada)
            if ($user->foto_profile) {
                // Menghapus foto lama dari penyimpanan
                Storage::delete($user->foto_profile);
            }

            // Menyimpan foto profile yang baru
            $fotoPath = $request->file('foto_profile')->store('foto_profile', 'public');
            $user->update(['foto_profile' => $fotoPath]);
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }


}
