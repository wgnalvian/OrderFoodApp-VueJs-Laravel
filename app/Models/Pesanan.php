<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'pemesan';
    }
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'pesanan_details');
    }
    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }
}
