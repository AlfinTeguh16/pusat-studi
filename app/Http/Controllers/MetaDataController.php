<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
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

        $karyas = DB::table('tb_karyas')
            ->leftJoin('tb_metadatas', function ($join) {
                $join->on('tb_karyas.id', '=', 'tb_metadatas.karyas_id')
                     ->where('tb_metadatas.jenis', '=', 'description');
            })
            ->select('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul', DB::raw('GROUP_CONCAT(tb_metadatas.content SEPARATOR ", ") as description'))
            ->where('tb_karyas.judul', 'LIKE', "%{$query}%")
            ->groupBy('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul')
            ->paginate(10);

        return view('users.meta-datas.metadata', compact('karyas', 'query'));
    }

    public function destroy($id)
    {
        DB::table('tb_metadatas')->where('karyas_id', $id)->delete();

        DB::table('tb_karyas')->where('id', $id)->delete();

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Menghapus Meta Data : ' . $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('metadata.list')->with('success', 'Data berhasil dihapus');
    }

    public function viewStoreMetaData()
    {
        return view('users.meta-datas.inputmetadata');
    }

    public function showMetaData($id)
    {
        $karya = DB::table('tb_karyas')->where('id', $id)->first();
        $metadata = DB::table('tb_metadatas')->where('karyas_id', $id)->orderBy('order')->get();

        // $username = DB::table('tb_karyas')
        //     ->join('users', 'tb_karyas.users_id', '=', 'users.id') 
        //     ->select('tb_karyas.id', 'users.username') 
        //     ->get();

        return view('users.meta-datas.detailmetadata', compact('karya', 'metadata'));
    }

    public function listMetaData() {
        $karyas = DB::table('tb_karyas')
            ->leftJoin('tb_metadatas', 'tb_karyas.id', '=', 'tb_metadatas.karyas_id')
            ->select('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul',
                DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "description" LIMIT 1) as description'))
            ->groupBy('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul')
            ->orderBy('tb_karyas.created_at', 'desc')
            ->paginate(10);

        return view('users.meta-datas.metadata', compact('karyas'));
    }


    public function storeMetaData(Request $request)
    {
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
            'activity' => 'Membuat Meta Data : ' . $request->judul,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return response()->json([
            'message' => session('success')
        ], 200);
    }


    public function editMetaData($id)
    {
        $karya = DB::table('tb_karyas')->where('id', $id)->first();
        $metadatas = DB::table('tb_metadatas')->where('karyas_id', $id)->orderBy('order')->get();

        return view('users.meta-datas.editdetail', compact('karya', 'metadatas'));
    }

    public function updateMetaData(Request $request, $id)
    {
        // Ambil data lama dari database
        $oldData = DB::table('tb_karyas')->where('id', $id)->first();

        // Cek apakah data 'judul' berubah
        if ($oldData->judul != $request->judul) {
            DB::table('tb_karyas')->where('id', $id)->update([
                'judul' => $request->judul,
                'updated_at' => now()
            ]);
        }

        // Hapus metadata lama
        DB::table('tb_metadatas')->where('karyas_id', $id)->delete();

        // Update atau insert metadata baru
        foreach ($request->metadata as $key => $value) {
            $filePath = null;
            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);
            }

            $newMetaData = [
                'label' => $request->label[$key],
                'jenis' => $request->jenis[$key],
                'content' => $filePath ? $filePath : $value,
                'order' => $key + 1,
                'karyas_id' => $id,
                'created_at' => now(),
                'updated_at' => now()
            ];

            DB::table('tb_metadatas')->insert($newMetaData);
        }

        // Log aktivitas hanya jika ada perubahan data
        if ($oldData->judul != $request->judul || !empty($request->metadata)) {
            Activity::create([
                'users_id' => Auth::user()->id,
                'activity' => 'Update Meta Data : ' . $request->judul,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


        return response()->json(['message' => 'Data updated successfully'], 200);
    }





}
