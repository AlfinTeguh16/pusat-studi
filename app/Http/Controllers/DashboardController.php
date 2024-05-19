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
        $karya =  Karya::latest()->take(3)->get();
        $metaData = MetaData::select('karyas_id' , 'jenis', 'content')->where('karyas_id' , 'jenis', 'description')->get();

        return view('users.dashboard', ['user' => $user], compact('karya', 'metaData'));
    }

    public function userMetaData($id){

        $karya = DB::table('tb_karyas')->where('id', $id)->first();
        $metaData = DB::table('tb_metadatas')->where('karyas_id', $id)->orderBy('order')->get();



        return view('users.meta-datas.detailmetadata', compact('metaData', 'karya'));
    }
    public function detailDashboardProduct($id){
        $product = Product::findOrFail($id);
        return view('users.products.detailproduct', compact('product'));
    }

    public function detailDashboardEvent($id){
        $event = Event::findOrFail($id);
        return view('users.events.detailevent', compact('event'));
    }

}
