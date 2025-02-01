<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_buku', 'harga', 'stok','image','id_penerbit','tanggal_terbit','id_genre'];
    public $timestamp = true;

    public function deleteImage(){
        if ($this->image && file_exists(public_path('images/buku' . $this->image))) {
            return unlink(public_path('images/buku' . $this->image));
        }
    }

    public function buku()
    {
        return $this->hasMany(buku::class);
    }
    
    public function penerbit ()
    {
        return $this->belongsTo(penerbit::class, 'id_penerbit');
    }

    public function genre ()
    {
        return $this->belongsTo(genre::class, 'id_genre');
    }

    
}
