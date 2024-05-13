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
            // Trim BOM and other whitespaces from the 'nidn' value
            $nidn = trim($row[0]);

            // Sesuaikan dengan struktur kolom pada tabel users
            $user = new User([
                'nidn' => $nidn,
                'username' => $nidn, // Set 'nama' to the value of 'nidn'
                'email' => $nidn . '@gmail.com', // Set 'email' to 'nidn@gmail.com'
                'password' => Hash::make($nidn), // Hash 'password' with the value of 'nidn'
            ]);

            $user->save();
        }

        return redirect()->back()->with('success', 'Data users berhasil diimpor.');
    }

}
