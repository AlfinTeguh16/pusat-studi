<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use Illuminate\Support\Facades\Auth;


class MetaDataController extends Controller
{
    public function index(){
        return view ('inputdosen.showmetadata');
    }

    public function viewInputMetaData(){
        return view ('inputdosen.inputmetadata');
    }
    public function inputMetaData(Request $request)
{
    try {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
            '3d_objek' => 'required',
            'nama_benda' => 'required',
            'tahun_pembuatan' => 'required',
            'periode_pembuatan_awal' => 'required',
            'periode_pembuatan_akhir' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
        ]);

        $nidn = Auth::user()->nidn;
        $name = Auth::user()->name;

        $gambar = $request->file('gambar');
        $nama_gambar = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $nama_gambar);

        MetaData::create([
            'nidn' => $nidn,
            'name' => $name,
            'judul' => $request->input('judul'),
            'gambar' => $nama_gambar,
            'deskripsi' => $request->input('deskripsi'),
            '3d_objek' => $request->input('3d_objek'),
            'nama_benda' => $request->input('nama_benda'),
            'tahun_pembuatan' => $request->input('tahun_pembuatan'),
            'periode_pembuatan_awal' => $request->input('periode_pembuatan_awal'),
            'periode_pembuatan_akhir' => $request->input('periode_pembuatan_akhir'),
            'provinsi' => $request->input('provinsi'),
            'kabupaten' => $request->input('kabupaten'),
            'kecamatan' => $request->input('kecamatan'),
        ]);

        return redirect()->route('inputdosen.inputmetadata')->with('success', 'Data berhasil disimpan.');
        
    } catch (\Exception $e) {

        return redirect()->route('inputdosen.inputmetadata')->with('error', 'Gagal menyimpan data. ' . $e->getMessage());
    }
}

}
