<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use App\Models\Creator;
use App\Models\Description;
use App\Models\Image;
use App\Models\Manufacture;
use App\Models\Material;
use App\Models\MetaData;
use App\Models\Model3D;
use App\Models\ObjectModel;
use App\Models\Product;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MetaDataController extends Controller
{
    // public function index()
    // {
    //     $metaData = MetaData::all();
    //     return view('users.meta-datas.metadata', compact('metaData'));
    // }

    // public function searchMetaData(Request $request)
    // {
    //     $query = $request->input('query');

    //     $metaData = MetaData::where('nidn', Auth::user()->nidn)
    //         ->when($query, function ($q) use ($query) {
    //             $q->where('judul', 'like', '%' . $query . '%')
    //                 ->orWhere('deskripsi', 'like', '%' . $query . '%');
    //         })
    //         ->orderByDesc('updated_at')
    //         ->paginate(10);

    //     return view('users.meta-datas.metadata', compact('metaData'));
    // }

    // public function viewMetaData($id){
    //     $metaData = MetaData::findOrFail($id);
    //     return view('users.meta-datas.detailmetadata', compact('metaData'));
    // }




    // public function viewEditMetaData($id){
    //     // $metaData = MetaData::findOrFail($id);
    //     // return view('users.meta-datas.editdetail', ['metaData' => $metaData]);

    //     try {
    //         $metaData = MetaData::findOrFail($id);

    //         return view('users.meta-datas.editdetail', compact('metaData'));
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error fetching Meta Data for editing: ' . $e->getMessage());
    //     }
    // }




    // public function destroy($id)
    // {
    //     try {
    //         $metaData = MetaData::findOrFail($id);

    //         $metaData->delete();

    //         return redirect()->route('searchMetaData')->with('success', 'Event deleted successfully');
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         return redirect()->back()->with('error', 'Meta Data not found');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error deleting Meta Data: ' . $e->getMessage());
    //     }
    // }

    public function viewStoreMetaData()
    {
        return view('users.meta-datas.inputmetadata');
    }


    public function storeMetaData(Request $request)
    {

        $karya_id = DB::table('tb_karyas')->insertGetId([
            'judul' => $request->judul,
            'users_id' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // foreach ($request->metadata as $key => $value) {

        //     DB::table('tb_metadatas')->insert([
        //         'jenis' => $request->jenis[$key],
        //         'content' => $value,
        //         'order' => $key + 1,
        //         'karyas_id' => $karya_id,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }

        foreach ($request->metadata as $key => $value) {

            if ($request->hasFile('metadata.' . $key)) {
                $file = $request->file('metadata.' . $key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'content/content_media/' . $fileName;
                $file->move(public_path('content/content_media'), $fileName);

                DB::table('tb_metadatas')->insert([
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'karyas_id' => $karya_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                DB::table('tb_metadatas')->insert([
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'karyas_id' => $karya_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        // return response()->json(['message' => 'Data created successfully', 'karya_id' => $karya_id], 201);
        return view ('users.meta-datas.inputmetadata');
    }

    public function viewMetaData($karya_id){

        // $metadata = DB::table('tb_metadatas')
        //             ->where('karyas_id', $karya_id)
        //             ->orderBy('order')
        //             ->get();
        $metaData = DB::table('tb_metadatas')
        ->join('tb_karyas', 'tb_metadatas.karyas_id', '=', 'tb_karyas.id')
        ->join('users', 'tb_karyas.users_id', '=', 'users.id')
        ->select('tb_metadatas.*', 'tb_karyas.judul', 'users.judul', 'users.nidn')
        ->where('tb_metadatas.karyas_id', $karya_id)
        ->orderBy('tb_metadatas.order')
        ->get();


        return view('users.meta-datas.detailmetadata', ['metadata' => $metaData]);
    }

}
