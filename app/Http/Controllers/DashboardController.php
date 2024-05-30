<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\Karya;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();

        $karyas = DB::table('tb_karyas')
        ->leftJoin('tb_metadatas', 'tb_karyas.id', '=', 'tb_metadatas.karyas_id')
        ->select('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul',
            DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "description" LIMIT 1) as description'),
            'tb_karyas.created_at')
        ->groupBy('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul', 'tb_karyas.created_at')
        ->orderBy('tb_karyas.created_at', 'desc')
        ->take(3)
        ->get();

        $events = DB::table('tb_events')
        ->leftJoin('tb_events_items', 'tb_events.id', '=', 'tb_events_items.events_id')
        ->select('tb_events.id', 'tb_events.users_id', 'tb_events.judul',
            DB::raw('(SELECT content FROM tb_events_items WHERE tb_events_items.events_id = tb_events.id AND jenis = "description" LIMIT 1) as description'),
            'tb_events.created_at')
        ->groupBy('tb_events.id', 'tb_events.users_id', 'tb_events.judul', 'tb_events.created_at')
        ->orderBy('tb_events.created_at', 'desc')
        ->take(3)
        ->get();

        $products = DB::table('tb_products')
        ->leftJoin('tb_products_items', 'tb_products.id', '=', 'tb_products_items.products_id')
        ->select('tb_products.id', 'tb_products.users_id', 'tb_products.judul',
            DB::raw('(SELECT content FROM tb_products_items WHERE tb_products_items.products_id = tb_products.id AND jenis = "description" LIMIT 1) as description'),
            'tb_products.created_at')
        ->groupBy('tb_products.id', 'tb_products.users_id', 'tb_products.judul', 'tb_products.created_at')
        ->orderBy('tb_products.created_at', 'desc')
        ->take(3)
        ->get();


        return view('users.dashboard', ['user' => $user], compact('karyas', 'events' , 'products'));
    }

    // public function userMetaData($id){

    //     $karyas = DB::table('tb_karyas')
    //         ->leftJoin('tb_metadatas', 'tb_karyas.id', '=', 'tb_metadatas.karyas_id')
    //         ->select('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul',
    //             DB::raw('(SELECT content FROM tb_metadatas WHERE tb_metadatas.karyas_id = tb_karyas.id AND jenis = "description" LIMIT 1) as description'))
    //         ->groupBy('tb_karyas.id', 'tb_karyas.users_id', 'tb_karyas.judul')
    //         ->latest()
    //         ->take(3)
    //         ->get();

    //     return view('users.meta-datas.metadata', compact('karyas'));
    // }
    // public function detailDashboardProduct($id){
    //     $product = Product::findOrFail($id);
    //     return view('users.products.detailproduct', compact('product'));
    // }

    // public function detailDashboardEvent($id){
    //     $event = Event::findOrFail($id);
    //     return view('users.events.detailevent', compact('event'));
    // }

}
