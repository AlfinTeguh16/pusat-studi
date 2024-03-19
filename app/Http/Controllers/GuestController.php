<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function index()
    {
        return view('home.pusatstudi');
    }

    public function getMetaData(){
        $metaData = MetaData::latest()->take(3)->get();
        $event =  Event::latest()->take(3)->get();
        $product =  Product::latest()->take(3)->get();
        return view ('home.pusatstudi', compact('metaData', 'event', 'product'));
    }


    public function showMetaData(Request $request){
        $query = $request->input('query');

        $metaDataQuery = MetaData::when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at');

        $metaData = $metaDataQuery->paginate(20);

        return view('meta.show', compact('metaData'));
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
