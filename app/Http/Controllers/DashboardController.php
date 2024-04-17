<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $metaData =  MetaData::latest()->take(3)->get();
        $event =  Event::latest()->take(3)->get();
        $product =  Product::latest()->take(3)->get();

        return view('users.dashboard', ['user' => $user], compact('metaData', 'event', 'product'));
    }

    public function userMetaData($id){
        $metaData = MetaData::findOrFail($id);

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
