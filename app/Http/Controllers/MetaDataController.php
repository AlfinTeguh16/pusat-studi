<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use Illuminate\Support\Facades\Auth;


class MetaDataController extends Controller
{
    public function index()
    {
        $metaData = MetaData::all();
        return view('inputdosen.showmetadata', compact('metaData'));
    }

    public function viewMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('inputdosen.detailmetadata', compact('metaData'));
    }

    public function getMetaData(){
        return view ('home.pusatstudi');
    }

    public function viewStoreMetaData(){
        return view('inputdosen.inputmetadata');
    }
    public function storeMetaData(Request $request)
    {
        try {
            $authenticatedUserNidn = Auth::user()->nidn;
            $authenticatedUserName = Auth::user()->nama;

            // Validate the request data
            $validatedData = $request->validate([
                'nidn' => 'required|string|in:' . $authenticatedUserNidn,
                'nama' => 'required|string|in:' . $authenticatedUserName,
                'judul' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'deskripsi' => 'required|string',
                'model_3d' => 'required|string',
                'nama_benda' => 'required|string',
                'tahun_pembuatan' => 'required|date',
                'periode_pembuatan_awal' => 'required|date',
                'periode_pembuatan_akhir' => 'required|date',
                'provinsi' => 'required|string',
                'kabupaten' => 'required|string',
                'kecamatan' => 'required|string',
            ]);

            // Store the uploaded file
            $gambarPath = $request->file('gambar')->store('gambar', 'public');

            // Add the authenticated user's nidn and the file path to the validated data
            $validatedData['nidn'] = $authenticatedUserNidn;
            $validatedData['nama'] = $authenticatedUserName;
            $validatedData['gambar'] = $gambarPath;

            // Create a new MetaData instance and fill it with validated data
            $metaData = new MetaData($validatedData);

            // Save the instance to the database
            $metaData->save();

            return redirect()->route('viewStoreMetaData')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, delete uploaded file, return an error response)
            return response()->json(['error' => 'Error saving data: ' . $e->getMessage()], 500);
        }
    }

    public function deleteMetaData(){

    }

}
