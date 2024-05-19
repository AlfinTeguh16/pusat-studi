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
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MetaDataController extends Controller
{
    public function index()
    {
        $karya = Karya::all();
        return view('users.meta-datas.metadata', compact('karya'));
    }

    public function searchMetaData(Request $request)
    {
        $query = $request->input('query');

        $karya = Karya::where('users_id', Auth::user()->id)
            ->when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%');
                    // ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('users.meta-datas.metadata', compact('karya'));
    }

    // public function viewMetaData($id){
    //     $metaData = MetaData::findOrFail($id);
    //     $karya = Karya::findOrFail($id);
    //     return view('users.meta-datas.detailmetadata', compact('metaData', 'karya'));
    // }


    public function destroy($id)
    {
        try {
            $metaData = Karya::where($id);

            $metaData->delete();

            return redirect()->route('searchMetaData')->with('success', 'Event deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Meta Data not found');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting Meta Data: ' . $e->getMessage());
        }
    }

    public function viewStoreMetaData()
    {
        return view('users.meta-datas.inputmetadata');
    }

    // ====================================================================================================================

    public function showMetaData($id)
    {
        $karya = DB::table('tb_karyas')->where('id', $id)->first();
        $metadata = DB::table('tb_metadatas')->where('karyas_id', $id)->orderBy('order')->get();

        return view('users.meta-datas.detailmetadata', compact('karya', 'metadata'));
    }

    public function listMetaData(){
        $karyas = DB::table('tb_karyas')
        ->leftJoin('tb_metadatas', function ($join) {
            $join->on('tb_karyas.id', '=', 'tb_metadatas.karyas_id')
                ->where('tb_metadatas.jenis', '=', 'description');
        })
        ->select('tb_karyas.id','tb_karyas.users_id', 'tb_karyas.judul', 'tb_metadatas.content as description')
        ->paginate(10);

        return view('users.meta-datas.metadata', compact('karyas'));
    }

    public function storeMetaData(Request $request)
    {
        // dd($request);
        $karya_id = DB::table('tb_karyas')->insertGetId([
            'judul' => $request->judul,
            'users_id' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($request->metadata as $key => $value) {

            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);

                DB::table('tb_metadatas')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'karyas_id' => $karya_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            else {
                DB::table('tb_metadatas')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'karyas_id' => $karya_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

        }

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Membuat metadata untuk karya ID ' . $karya_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return response()->json(['message' => 'Data created successfully', 'karya_id' => $karya_id, 'value' => $value], 201);
        // return view ('users.meta-datas.inputmetadata');
    }


    public function editMetaData($id)
    {
        $karya = DB::table('tb_karyas')->where('id', $id)->first();
        $metadatas = DB::table('tb_metadatas')->where('karyas_id', $id)->orderBy('order')->get();

        return view('users.meta-datas.editdetail', compact('karya', 'metadatas'));
    }

    public function updateMetaData(Request $request, $id)
    {
        // Update judul
        DB::table('tb_karyas')->where('id', $id)->update([
            'judul' => $request->judul,
            'updated_at' => now()
        ]);

        // Hapus metadata lama
        DB::table('tb_metadatas')->where('karyas_id', $id)->delete();

        // Insert metadata baru
        foreach ($request->metadata as $key => $value) {
            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);

                DB::table('tb_metadatas')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'karyas_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                DB::table('tb_metadatas')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'karyas_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Mengupdate metadata untuk karya ID ' . $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['message' => 'Data updated successfully'], 200);
    }




}
