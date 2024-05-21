<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function userActivity($users_id){
        $userActivities = DB::table('tb_user_activitys')
            ->join('users', 'tb_user_activitys.users_id', '=', 'users.id')
            ->where('users.id', $users_id)
            ->select('users.nidn', 'users.username', 'tb_user_activitys.activity', 'tb_user_activitys.created_at')
            ->get();

        // Mengecek apakah data ditemukan
        if ($userActivities->isEmpty()) {
            return response()->json(['message' => 'User not found or no activities'], 404);
        }

        // return response()->json($userActivities);
        return view('admin.admin', compact('userActivities'));
    }

    public function galery(){
        
    }



}
