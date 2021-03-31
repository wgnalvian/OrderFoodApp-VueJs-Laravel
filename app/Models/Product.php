<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function pesanans()
    {
        return $this->belongsToMany(Pesanan::class, 'pesanan_details');
    }
    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }
}
