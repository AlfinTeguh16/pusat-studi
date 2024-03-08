<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function index()
    {
        return view('home.pusatstudi');
    }

    public function showMetaData(){
        $metaData = MetaData::all();
        return view('meta.show', compact('metaData'));
    }

    public function viewMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('meta.detal', compact('metaData'));
    }
}
