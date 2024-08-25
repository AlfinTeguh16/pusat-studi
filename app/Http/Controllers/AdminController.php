<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\Carousel;
use App\Models\Team;

class AdminController extends Controller
{
    public function viewAdmin()
    {

        $userActivities = DB::table("users")
            ->join(
                "tb_user_activitys",
                "users.id",
                "=",
                "tb_user_activitys.users_id"
            )
            ->select(
                "users.username",
                "tb_user_activitys.activity",
                "tb_user_activitys.created_at"
            )
            ->orderBy("tb_user_activitys.created_at", "desc")
            ->paginate(10);

        return view("admins.admin", compact( "userActivities"));
    }

    public function viewDashboardContent()
    {
        $carousel = Gallery::where("imgtype", "carousel")->get();
        $about = Gallery::where("imgtype", "about")->first();
        $gallery = Gallery::where("imgtype", "gallery")->get();
        $team = Gallery::where("imgtype", "team")->get();

        return view("admins.dashboardContent", compact("gallery", "carousel", "team" , "about") );
    }

    public function store(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120",
            "imgtype" => "required",
        ]);

        $fileName = time() . "." . $request->image->extension();
        $filePath = "asset/storage/dashboard_content/" . $fileName;
        $request->image->move(public_path("asset/storage/dashboard_content"), $fileName);

        Gallery::create([
            "imageDescription" => $request->input("imageDescription"),
            "image" => $filePath,
            "team" => $request->input("team","0"),
            "imgtype" => $request->input("imgtype")
        ]);

        return redirect()
            ->route("viewDashboardContent")
            ->with("success", "Data Berhasil di Upload");
    }

    public function update(Request $request, $id)
    {


        $gallery = Gallery::findOrFail($id);

        $gallery->imageDescription = $request->input("imageDescription");

        if ($request->hasFile("image")) {
            if (file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $fileName = time() . "." . $request->image->extension();
            $filePath = "asset/storage/dashboard_content/" . $fileName;
            $request->image->move(
                public_path("asset/storage/dashboard_content"),
                $fileName
            );
            $gallery->image = $filePath;
        }

        $gallery->save();

        return redirect()
            ->route("viewDashboardContent")
            ->with("success", "Data Berhasil di Ubah");
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if (file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect()
            ->route("viewDashboardContent")
            ->with("success", "Data Berhasil Di Hapus");
    }


}
