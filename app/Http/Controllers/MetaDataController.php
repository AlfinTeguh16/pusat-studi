<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MetaDataController extends Controller
{
    public function index()
    {
        $metaData = MetaData::all();
        return view('inputdosen.profiledosen', compact('metaData'));
    }

    public function viewMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('inputdosen.detailmetadata', compact('metaData'));
    }

    public function getMetaData(){
        MetaData::latest()->take(3)->get();
        return view ('home.pusatstudi', compact('metaData'));
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
                // 'model_3d' => 'string',
                // 'video' => 'mimes:mp4,mov,avi|max:10240',
                // 'link' => 'string',
                'nama_benda' => 'required|string',
                'tahun_pembuatan' => 'required|date',
                'periode_pembuatan_awal' => 'required|date',
                'periode_pembuatan_akhir' => 'required|date',
                'provinsi' => 'required|string',
                'kabupaten' => 'required|string',
                'kecamatan' => 'required|string',
            ]);

            $gambarPath = $request->file('gambar')->store('gambar', 'public');

            $videoPath = null;

            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public');
            }

            $validatedData['nidn'] = $authenticatedUserNidn;
            $validatedData['nama'] = $authenticatedUserName;
            $validatedData['gambar'] = $gambarPath;
            $validatedData['video'] = $videoPath;

            $validatedData['video'] = $request->hasFile('video') ? $request->file('video')->store('video', 'public') : null;
            $validatedData['model_3d'] = $request->filled('model_3d') ? $request->input('model_3d') : null;
            $validatedData['link'] = $request->filled('link') ? $request->input('link') : null;

            $metaData = new MetaData($validatedData);


            $metaData->save();

            return redirect()->route('viewStoreMetaData')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {

            return response()->json(['error' => 'Error saving data: ' . $e->getMessage()], 500);
        }
    }

    public function deleteMetaData(){

    }

    public function viewEditMetaData(){
        $metaData = MetaData::all();
        return view('inputdosen.editdetail', ['metaData' => $metaData]);
    }
    public function editMetaData(Request $request, $id)
    {
        try {
            // Temukan data berdasarkan ID
            $metaData = MetaData::findOrFail($id);

            // Lakukan validasi
            $validatedData = $request->validate([
                // Sesuaikan dengan aturan validasi yang diperlukan
                'judul' => 'required|string',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'deskripsi' => 'required|string',
                'model_3d' => 'string', // Sesuaikan dengan aturan validasi yang sesuai
                'video' => 'string', // Sesuaikan dengan aturan validasi yang sesuai
                'link' => 'string', // Sesuaikan dengan aturan validasi yang sesuai
                'nama_benda' => 'required|string',
                'tahun_pembuatan' => 'required|date',
                'periode_pembuatan_awal' => 'required|date',
                'periode_pembuatan_akhir' => 'required|date',
                'provinsi' => 'required|string',
                'kabupaten' => 'required|string',
                'kecamatan' => 'required|string',
            ]);

            // Perbarui data dengan nilai baru
            $metaData->update([
                'judul' => $validatedData['judul'],
                'deskripsi' => $validatedData['deskripsi'],
                'model_3d' => $validatedData['model_3d'],
                'nama_benda' => $validatedData['nama_benda'],
                'tahun_pembuatan' => $validatedData['tahun_pembuatan'],
                'periode_pembuatan_awal' => $validatedData['periode_pembuatan_awal'],
                'periode_pembuatan_akhir' => $validatedData['periode_pembuatan_akhir'],
                'provinsi' => $validatedData['provinsi'],
                'kabupaten' => $validatedData['kabupaten'],
                'kecamatan' => $validatedData['kecamatan'],
            ]);

            // Jika gambar diunggah, simpan yang baru dan hapus yang lama
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('gambar', 'public');
                Storage::delete('public/' . $metaData->gambar);
                $metaData->gambar = $gambarPath;
                $metaData->save();
            }

            // Jika video diunggah, simpan yang baru dan hapus yang lama
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public');
                Storage::delete('public/' . $metaData->video);
                $metaData->video = $videoPath;
                $metaData->save();
            }

            // Redirect dengan pesan sukses
            return redirect()->route('viewEditMetaData')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, delete uploaded files, return an error response)
            return response()->json(['error' => 'Error updating data: ' . $e->getMessage()], 500);
        }
    }

}
