<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carausel;

class HomeContentController extends Controller
{
    public function getHomeData(){
        
    }

    public function createCarausel(Request $request){
        
        $request->validate([
            'crauselImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $fileName = time().'.'.$request->image->extension();
        $filePath = 'asset/storage/carausel/' . $fileName;
        $request->image->move(public_path('asset/storage/carausel'), $fileName);

        Carausel::create([
            'carauselImage' => $filePath,
        ]);

        return redirect()->route('viewHomeContent')
                        ->with('success', 'Image uploaded successfully.');

    }

    public function updateCarausel(Request $request, $id){

        $request->validate([
            'carauselImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $carausel = Carausel::findOrFail($id);

        if ($request->hasFile('carauselImage')) {
            
            if (file_exists(public_path($carausel->carauselImage))) {
                unlink(public_path($carausel->carauselImage));
            }
            
            $fileName = time().'.'.$request->carauselImage->extension();
            $filePath = 'asset/storage/carausel/' . $fileName;
            $request->carauselImage->move(public_path('asset/storage/carausel'), $fileName);
            $carausel->carauselImage = $filePath;
        }

        $carausel->save();

    }
}
