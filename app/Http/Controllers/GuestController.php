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

    public function showMetaData(Request $request){
        $query = $request->input('query');

        $metaDataQuery = MetaData::when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at');

        $metaData = $metaDataQuery->paginate(10);

        return view('meta.show', compact('metaData'));
    }


    public function viewMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('meta.detal', compact('metaData'));
    }
}
