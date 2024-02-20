<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use Illuminate\Support\Facades\Auth;


class GuestMetaDataController extends Controller
{
    public function index()
    {
        $metaData = MetaData::all();
        return view('meta.show', compact('metaData'));
    }

    public function viewMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('meta.detal', compact('metaData'));
    }
}
