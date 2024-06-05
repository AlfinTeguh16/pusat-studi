<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Galery;

class AdminController extends Controller
{
    // public function userActivity()
    // {
    //     $userActivities = DB::table('users')
    //         ->join('tb_user_activitys', 'users.id', '=', 'tb_user_activitys.users_id')
    //         ->select('users.username', 'tb_user_activitys.activity', 'tb_user_activitys.created_at')
    //         ->paginate(10);

    //     return view('admins.admin', compact('userActivities'));
    // }

    public function viewAdmin()
    {
        $galery = Galery::all();
        $userActivities = DB::table('users')
        ->join('tb_user_activitys', 'users.id', '=', 'tb_user_activitys.users_id')
        ->select('users.username', 'tb_user_activitys.activity', 'tb_user_activitys.created_at')
        ->orderBy('tb_user_activitys.created_at', 'desc')
        ->paginate(10);

        return view('admins.admin', compact('galery', 'userActivities'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time().'.'.$request->image->extension();
        $filePath = 'asset/storage/galery/' . $fileName;
        $request->image->move(public_path('asset/storage/galery'), $fileName);

        Galery::create([
            'image' => $filePath,
        ]);

        return redirect()->route('viewAdmin')
                         ->with('success', 'Image uploaded successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $galery = Galery::findOrFail($id);

        if ($request->hasFile('image')) {

            if (file_exists(public_path($galery->image))) {
                unlink(public_path($galery->image));
            }

            $fileName = time().'.'.$request->image->extension();
            $filePath = 'asset/storage/galery/' . $fileName;
            $request->image->move(public_path('asset/storage/galery'), $fileName);
            $galery->image = $filePath;
        }

        $galery->save();

        return redirect()->route('viewAdmin')->with('success', 'Image updated successfully.');
    }


    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        if (file_exists(public_path($galery->image))) {
            unlink(public_path($galery->image));
        }
        $galery->delete();

        return redirect()->route('viewAdmin')->with('success', 'Image deleted successfully.');
    }
}
