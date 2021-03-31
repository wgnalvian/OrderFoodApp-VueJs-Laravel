<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{

    public function __construct()
    {
        
        // header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
        
    }

    public function index()
    {
        return response()->json([
            'products' => Product::latest()->take(4)->get() 
        ]);
    }
    public function search(Request $request)
    {
        $products = Product::where('nama', 'like', '%'.$request->keyword.'%')->get();

        return response()->json([
            'products' => $products
        ]);
        
        // return response()->json([
        //     'resultProducts' => $products
        // ]);
        
    }
    public function store(Request $request)
    {      
       
        $product = Product::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'is_ready' => $request->is_ready ? 1 : 0,
            'gambar' => $request->gambar,            
        ]);


        return response()->json([
            'message' => 'data berhasil disimpan',
            'data' => $product
        ]);
    }
    public function showProduct(Product $product)
    {
        
        

        return response()->json([
            'product' => $product,
            
            
        ]);
    }
    
}
