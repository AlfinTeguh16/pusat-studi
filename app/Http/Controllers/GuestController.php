<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function index()
    {
        return view('home.pusatstudi');
    }

    public function getMetaData(){
        $karyas = DB::table('tb_karyas')
        ->leftJoin('tb_metadatas', 'tb_karyas.id', '=', 'tb_metadatas.karyas_id')
        ->select(
            'tb_karyas.id',
            'tb_karyas.users_id',
            'tb_karyas.judul',
            DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "description" LIMIT 1) as description'),
            DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "imageTitle" ORDER BY `order` ASC LIMIT 1) as imageTitle'),
            'tb_karyas.created_at'
        )
        ->groupBy('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul', 'tb_karyas.created_at')
        ->orderBy('tb_karyas.created_at', 'desc')
        ->take(3)
        ->get();
        // $event =  Event::latest()->take(3)->get();
        // $product =  Product::latest()->take(3)->get();
        return view ('home.pusatstudi', compact('karyas'));
    }


    public function showMetaData(Request $request){
        $query = $request->input('query');
        $karyas = DB::table('tb_karyas')
        ->leftJoin('tb_metadatas', 'tb_karyas.id', '=', 'tb_metadatas.karyas_id')
        ->select(
            'tb_karyas.id',
            'tb_karyas.users_id',
            'tb_karyas.judul',
            DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "description" LIMIT 1) as description'),
            DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "imageTitle" ORDER BY `order` ASC LIMIT 1) as imageTitle'),
            'tb_karyas.created_at'
        )
        ->groupBy('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul', 'tb_karyas.created_at')
        ->orderBy('tb_karyas.created_at', 'desc')
        ->paginate(10);

        return view('meta.metadata', compact('karyas', 'query'));
    }


    public function viewMetaData($id){
        $metaData = MetaData::findOrFail($id);
        return view('meta.detail', compact('metaData'));
    }
    public function showGuestEvent(Request $request){
        $query = $request->input('query');

        $eventQuery = Event::when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at');

        $event = $eventQuery->paginate(20);

        return view('meta.event', compact('event'));
    }


    public function viewGuestEvent($id){
        $event = Event::findOrFail($id);
        return view('meta.detailevent', compact('event'));
    }

    public function showGuestProduct(Request $request){
        $query = $request->input('query');

        $productQuery = Product::when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at');

        $product = $productQuery->paginate(20);

        return view('meta.product', compact('product'));
    }


    public function viewGuestProduct($id){
        $product = Product::findOrFail($id);
        return view('meta.detailproduct', compact('product'));
    }
}
