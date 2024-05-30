<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\Event;
use App\Models\Product;
use App\Models\Galery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function index()
    {
        return view('home.pusatstudi');
    }

    public function getMetaData(){
        $galery = Galery::all();
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
        return view ('home.pusatstudi', compact('galery','karyas'));
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
        $karya = DB::table('tb_karyas')->where('id', $id)->first();
        $metadata = DB::table('tb_metadatas')->where('karyas_id', $id)->orderBy('order')->get();

        return view('meta.detail', compact('karya', 'metadata'));
    }
    public function showGuestEvent(Request $request){
        $query = $request->input('query');
        $event = DB::table('tb_events')
        ->leftJoin('tb_events_items', 'tb_events.id', '=', 'tb_events_items.events_id')
        ->select(
            'tb_events.id',
            'tb_events.users_id',
            'tb_events.judul',
            DB::raw('(SELECT content FROM tb_events_items WHERE tb_events_items.events_id = tb_events.id AND jenis = "description" LIMIT 1) as description'),
            DB::raw('(SELECT content FROM tb_events_items WHERE tb_events_items.events_id = tb_events.id AND jenis = "imageTitle" ORDER BY `order` ASC LIMIT 1) as imageTitle'),
            'tb_events.created_at'
        )
        ->groupBy('tb_events.id', 'tb_events.users_id', 'tb_events.judul', 'tb_events.created_at')
        ->orderBy('tb_events.created_at', 'desc')
        ->paginate(10);

        return view('meta.event', compact('event', 'query'));
    }


    public function viewGuestEvent($id){
        $event = DB::table('tb_events')->where('id', $id)->first();
        $eventItems = DB::table('tb_events_items')->where('events_id', $id)->orderBy('order')->get();

        return view('meta.detailevent', compact('event', 'eventItems'));
    }

    public function showGuestProduct(Request $request){
        $query = $request->input('query');
        $product = DB::table('tb_products')
        ->leftJoin('tb_products_items', 'tb_products.id', '=', 'tb_products_items.products_id')
        ->select(
            'tb_products.id',
            'tb_products.users_id',
            'tb_products.judul',
            DB::raw('(SELECT content FROM tb_products_items WHERE tb_products_items.products_id = tb_products.id AND jenis = "description" LIMIT 1) as description'),
            DB::raw('(SELECT content FROM tb_products_items WHERE tb_products_items.products_id = tb_products.id AND jenis = "imageTitle" ORDER BY `order` ASC LIMIT 1) as imageTitle'),
            'tb_products.created_at'
        )
        ->groupBy('tb_products.id', 'tb_products.users_id', 'tb_products.judul', 'tb_products.created_at')
        ->orderBy('tb_products.created_at', 'desc')
        ->paginate(10);

        return view('meta.product', compact('product', 'query'));
    }


    public function viewGuestProduct($id){
        $products = DB::table('tb_products')->where('id', $id)->first();
        $productItems = DB::table('tb_products_items')->where('products_id', $id)->orderBy('order')->get();

        return view('meta.detailproduct', compact('products', 'productItems'));
    }
}
