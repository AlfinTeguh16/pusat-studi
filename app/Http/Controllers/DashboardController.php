<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\Karya;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $metaData =  Karya::latest()->take(3)->get();
        // $content = MetaData::all();
        $content = MetaData::select('jenis', 'content')->where('jenis', 'description')->get();
        // $event =  Event::latest()->take(3)->get();
        // $product =  Product::latest()->take(3)->get();

        return view('users.dashboard', ['user' => $user], compact('metaData', 'content'));
    }

    public function userMetaData($id){
        $metaData = Metadata::findOrFail($id);


        return view('users.meta-datas.detailmetadata', compact('metaData'));
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
