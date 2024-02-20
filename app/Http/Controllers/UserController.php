<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return view ('user');
    }
    public function importUsers(Request $request)
    {
        // Validasi file CSV
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendapatkan path file
        $file = $request->file('file');
        $filePath = $file->getPathname();

        // Membaca file CSV
        $csvData = array_map('str_getcsv', file($filePath));

        ini_set("max_execution_time", 500);

        // Iterasi data dan masukkan ke tabel users
        foreach ($csvData as $row) {
            // Sesuaikan dengan struktur kolom pada tabel users
            $user = new User([
                'nidn' => $row[0], // Sesuaikan dengan indeks kolom pada file CSV
                'nama' => $row[0], // Set 'nama' to the value of 'nidn'
                'email' => $row[0] . '@gmail.com', // Set 'email' to 'nidn@gmail.com'
                'password' => Hash::make($row[0]), // Hash 'password' with the value of 'nidn'
            ]);

            $user->save();
        }

        return redirect()->back()->with('success', 'Data users berhasil diimpor.');
    }

}
