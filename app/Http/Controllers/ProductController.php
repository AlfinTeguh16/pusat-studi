<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $product = Product::where('nidn', Auth::user()->nidn)->paginate(10);

            return view('users.products.product', compact('user', 'product'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching events: ' . $e->getMessage());
        }
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');

        $product = Product::where('nidn', Auth::user()->nidn)
            ->when($query, function ($q) use ($query) {
                $q->where('judul', 'like', '%' . $query . '%')
                    ->orWhere('deskripsi', 'like', '%' . $query . '%');
            })
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('users.products.product', compact('product'));
    }

    public function detailProduct($id){
        $product = Product::findOrFail($id);
        return view('users.products.detailproduct', compact('product'));
    }

    public function viewStoreProduct(){
        return view('users.products.inputproduct');
    }

    public function create(Request $request)
    {
        try {
            $authenticatedUser = Auth::user();
            if (!$authenticatedUser) {
                return redirect()->back()->with('error', 'User not authenticated');
            }

            $authenticatedUserNidn = $authenticatedUser->nidn;
            $authenticatedUserName = $authenticatedUser->nama;

            $validatedData = $request->validate([
                'nidn' => 'required|string|in:' . $authenticatedUserNidn,
                'nama' => 'required|string|in:' . $authenticatedUserName,
                'judul' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sub_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi' => 'required',
                'link' => 'url',
            ]);

            // $gambarPath = $request->file('gambar')->store('product_images', 'public');
            // $subGambarPath = $request->file('sub_gambar')->store('sub_product_images', 'public');

            $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('product_images', 'public') : null;
            $subGambarPath = $request->hasFile('sub_gambar') ? $request->file('sub_gambar')->store('sub_product_images', 'public') : null;

            $validatedData['nidn'] = $authenticatedUserNidn;
            $validatedData['nama'] = $authenticatedUserName;
            $validatedData['gambar'] = $gambarPath;
            $validatedData['sub_gambar'] = $subGambarPath;

            $product = Product::create($validatedData);

            $product->save();

            return view('users.products.inputproduct')->with('success', 'Event created successfully');
            // return response()->json(['success' => 'Event created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating Product: ' . $e->getMessage());
        }
    }


    public function viewUpdateProduct($id){
        try {
            $product = Product::findOrFail($id);

            return view('users.products.editproduct', compact('product'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching event for editing: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $authenticatedUser = Auth::user();
            if (!$authenticatedUser) {
                return redirect()->back()->with('error', 'User not authenticated');
            }

            $authenticatedUserNidn = $authenticatedUser->nidn;
            $authenticatedUserName = $authenticatedUser->nama;

            $validatedData = $request->validate([
                'judul' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sub_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi' => 'required',
                'link' => 'url',
            ]);

            $product = Product::findOrFail($id);

            $product->judul = $validatedData['judul'];
            $product->deskripsi = $validatedData['deskripsi'];
            $product->link = $validatedData['link'];

            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('product_images', 'public');
                $product->gambar = $gambarPath;
            }

            if ($request->hasFile('sub_gambar')) {
                $subGambarPath = $request->file('sub_gambar')->store('sub_product_images', 'public');
                $product->sub_gambar = $subGambarPath;
            }

            $product->save();

            return redirect()->route('viewUpdateProduct', ['id' => $product->id])->with('success', 'Event updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating Product: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            $product->delete();

            return redirect()->route('searchProduct')->with('success', 'Event deleted successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Event not found');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting Product: ' . $e->getMessage());
        }
    }
}
