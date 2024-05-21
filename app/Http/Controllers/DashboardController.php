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



        return view('users.dashboard', ['user' => $user], compact('karyas'));
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
