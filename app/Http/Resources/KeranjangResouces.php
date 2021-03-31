<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeranjangResouces extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => $this->product->nama,
            'gambar' => $this->product->gambar,
            'keterangan' => $this->keterangan,
            'jumlahPesanan' => $this->jumlah_pesanan,
            'hargaProduct' => $this->product->harga,
            'totalHargaProduct' => $this->total_harga,
            'pemesan' => $this->pesanan->pemesan,
            'nomerMeja' => $this->pesanan->no_meja,
            'total' => $this->pesanan->total_harga
        ];
    }
}
