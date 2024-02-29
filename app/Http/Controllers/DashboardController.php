<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $metaData = MetaData::all();

        return view('inputdosen.dashboard', ['user' => $user], compact('metaData'));
    }

    public function userMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('inputdosen.detailmetadata', compact('metaData'));
    }
}
