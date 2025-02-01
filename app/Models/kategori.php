<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_kategori'];
    public $timestamp = true;

    //relasi ke tabel kategori
    public function kategori ()
    {
        return $this->hasMany(kategori::class);
    }

}
