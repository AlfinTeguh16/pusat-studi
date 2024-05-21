<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductItems;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('users.products.product', compact('products'));
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        $products = DB::table('tb_products')
            ->leftJoin('tb_products_items', function ($join) {
                $join->on('tb_products.id', '=', 'tb_products_items.products_id')
                     ->where('tb_products_items.jenis', '=', 'description');
            })
            ->select('tb_products.id', 'tb_products.users_id', 'tb_products.judul', DB::raw('GROUP_CONCAT(tb_products_items.content SEPARATOR ", ") as description'))
            ->where('tb_products.judul', 'LIKE', "%{$query}%")
            ->groupBy('tb_products.id', 'tb_products.users_id', 'tb_products.judul')
            ->paginate(10);

        return view('users.products.product', compact('products', 'query'));
    }

    public function destroy($id)
    {
        DB::table('tb_products_items')->where('products_id', $id)->delete();

        DB::table('tb_products')->where('id', $id)->delete();

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Mennghapus Products dan karya ID ' . $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('products.list')->with('success', 'Data berhasil dihapus');
    }

    public function viewStoreProduct()
    {
        return view('users.products.inputproduct');
    }



    public function showProduct($id)
    {
        $products = DB::table('tb_products')->where('id', $id)->first();
        $productItems = DB::table('tb_products_items')->where('products_id', $id)->orderBy('order')->get();

        return view('users.products.detailproduct', compact('products', 'productItems'));
    }
    public function listProduct() {
        $products = DB::table('tb_products')
            ->leftJoin('tb_products_items', 'tb_products.id', '=', 'tb_products_items.products_id')
            ->select('tb_products.id', 'tb_products.users_id', 'tb_products.judul',
                DB::raw('(SELECT content FROM tb_products_items WHERE tb_products_items.products_id = tb_products.id AND jenis = "description" LIMIT 1) as description'))
            ->groupBy('tb_products.id', 'tb_products.users_id', 'tb_products.judul')
            ->orderBy('tb_products.created_at', 'desc')
            ->paginate(10);

        return view('users.products.product', compact('products'));
    }


    public function storeProducts(Request $request)
    {
        // dd($request);
        $products_id = DB::table('tb_products')->insertGetId([
            'judul' => $request->judul,
            'users_id' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($request->product as $key => $value) {

            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);

                DB::table('tb_products_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'products_id' => $products_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            else {
                DB::table('tb_products_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'products_id' => $products_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

        }

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Membuat product pada ID ' . $products_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return response()->json(['message' => 'Data created successfully', 'products_id' => $products_id, 'value' => $value], 201);
        // return view ('users.meta-datas.inputmetadata');
    }


    public function editProducts($id)
    {
        $product = DB::table('tb_products')->where('id', $id)->first();
        $productItems = DB::table('tb_products_items')->where('products_id', $id)->orderBy('order')->get();

        return view('users.products.editproduct', compact('product', 'productItems'));
    }

    public function updateProducts(Request $request, $id)
    {

        DB::table('tb_products')->where('id', $id)->update([
            'judul' => $request->judul,
            'updated_at' => now()
        ]);

        DB::table('tb_products_items')->where('products_id', $id)->delete();

        foreach ($request->product as $key => $value) {
            if (is_file($value)) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $filePath = 'storage/content/' . $fileName;
                $value->move(public_path('storage/content'), $fileName);

                DB::table('tb_products_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $filePath,
                    'order' => $key + 1,
                    'products_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                DB::table('tb_products_items')->insert([
                    'label' => $request->label[$key],
                    'jenis' => $request->jenis[$key],
                    'content' => $value,
                    'order' => $key + 1,
                    'products_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        Activity::create([
            'users_id' => Auth::user()->id,
            'activity' => 'Mengupdate product pada ID ' . $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['message' => 'Data updated successfully'], 200);
    }


}
