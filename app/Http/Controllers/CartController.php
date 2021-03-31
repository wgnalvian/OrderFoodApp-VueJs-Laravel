<?php

namespace App\Http\Controllers;

use App\Http\Resources\KeranjangResouces;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function store(Request $request)
    {
        $request->session()->regenerate();
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric',
            'nomerMeja' => 'required|numeric'
        ]);

        $product = Product::find($request->productId);
        $pesanan = Pesanan::where('pemesan', $request->nama)->where('status', "0")->first();

        if ($pesanan == null) {


            $pesanan = Pesanan::create([
                'pemesan' => $request->nama,
                'status' => "0",
                'no_meja' => $request->nomerMeja,
                'total_harga' =>  $request->jumlah * $product->harga,
            ]);



            $keranjang = PesananDetail::create([
                'jumlah_pesanan' => $request->jumlah,
                'total_harga' => $request->jumlah * $product->harga,
                'keterangan' => $request->keterangan ? $request->keterangan : '',
                'pesanan_id' => $pesanan->id,
                'product_id' => $product->id,

            ]);
        } else {
            $keranjang = PesananDetail::create([
                'jumlah_pesanan' => $request->jumlah,
                'total_harga' => $request->jumlah * $product->harga,
                'keterangan' => $request->keterangan ? $request->keterangan : '',
                'pesanan_id' => $pesanan->id,
                'product_id' => $product->id,

            ]);

            $pesanan->total_harga = $pesanan->total_harga + $keranjang->total_harga;
            $pesanan->update();
        }
        return response()->json([
            'keranjang' => $keranjang,

        ]);
    }
    public function count(Pesanan $pesanan)
    {
        $pesanan = Pesanan::where('pemesan', $pesanan->pemesan)->where('status', '0')->first();
        return response()->json([
            'pesanan' => $pesanan->pesananDetail()->count()
        ]);
    }
    public function cart(Pesanan $pesanan)
    {
        $pesanan = Pesanan::where('pemesan', $pesanan->pemesan)->where('status', '0')->first();
        if (!$pesanan->count() < 1) {

            return  KeranjangResouces::collection($pesanan->pesananDetail);
        }
    }
    public function destroy(PesananDetail $pesananDetail)
    {
        $pesananDetail->delete();
        return response()->json([
            'message' => 'Pesanan success dihapus'
        ]);
    }
    public function checkout(Pesanan $pesanan)
    {

        $pesanan = Pesanan::where('pemesan', $pesanan->pemesan)->where('status', '0')->first();

        $pesanan->status = "1";
        $pesanan->update();

        return response()->json([
            'message' => "Pesanan sukses dipesan silahkan tunggu pesanan akan segera datang"
        ]);
    }
}
