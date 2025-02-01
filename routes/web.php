<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SiswasController;
use App\Http\Controllers\ppdbsController;
use App\Http\Controllers\penggunasController;
use App\Http\Controllers\TeleponController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\productController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\penerbitController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\pembeliController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\transaksiController;
use App\Models\transaksi;
use App\Models\buku;
use App\Models\pembeli;
use App\Models\genre;
use App\Models\penerbit;
use App\Models\order;
use App\Models\customer;
use App\Models\product;
use App\Models\produk;
use App\Models\kategori;
use App\Models\Telepon;
use App\Models\pengguna;
use App\Models\post;
use App\Models\barang;
use App\Models\ppdb;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return "Selamat Datang Di Home";
});

Route::get('/about', function () {
    return "Selamat Datang Di About";
});

Route::get('/contact', function () {
    return "Selamat Datang Di contact";
});

//route parameter
route::get('/tes/{nama}', function($nama){
    return 'Nama : ' .$nama;
});

route::get('/tes/{nama2}/{umur2}', function($nama, $umur){
    return  "Nama : " .$nama. "<br>".
            "umur : " .$umur;
});

route::get('/tes/{nama}/{tmptlhr}/{jk}/{agama}/{alamat}', function($nama, $tmptlhr, $jk, $agama, $alamat){
    return  "Nama : " .$nama. "<br>".
            "Tempat Lahir : " .$tmptlhr. "<br>".
            "Jenis Kelamin : " .$jk. "<br>".
            "Agama : " .$agama. "<br>".
            "Alamat : " .$alamat;
});

route::get('/hitung/{bilangan1}/{bilangan2}', function($bilangan1, $bilangan2){
    $hitung = $bilangan1 + $bilangan2;
    return  "Bilangan 1 : " .$bilangan1. "<br>".
            "Bilangan 2 : " .$bilangan2. "<br>".
            "hasil : " .$hitung;
});

route::get('/latihan/{nama}/{tlpn}/{jnsbrng}/{nmbrg}/{jmlh}/{pmbyrn}', function ($nama, $tlpn,$jnsbrg,$nmbrg,$jmlh,$pmbyrn){
   
   if ($jnsbrg == "handphone") {
        if ($nmbrg == "poco") {
            $harga = 3000000;
        } elseif ($nmbrg == "samsung") {
            $harga = 5000000;
        } elseif ($nmbrg == "iphone") {
            $harga = 15000000;
        }
   } elseif ($jnsbrg == "laptop") {
    if ($nmbrg == "lenovo") {
        $harga = 4000000;
    } elseif ($nmbrg == "acer") {
        $harga = 8000000;
    } elseif ($nmbrg == "macbook") {
        $harga = 20000000;
    }
} elseif ($jnsbrg == "tv") {
    if ($nmbrg == "Toshiba") {
        $harga = 5000000;
    } elseif ($nmbrg == "samsung") {
        $harga = 8000000;
    } elseif ($nmbrg == "LG") {
        $harga = 10000000;
    }
}

$total = $harga * $jmlh;

if ($total > 10000000) {
    $cashback = 500000;
}  else {
    $cashback = 0;
}
   
if ($pembayaran = "transfer") {
     $potongan = 50000;
} else {
    $potongan = 0;
}

$total2 = $total - $cashback - $potongan;

    return  "Nama : " .$nama. "<br>".
            "Telepon : " .$tlpn. "<br>
            ---------------------------------------- <br>".
            "Jenis Barang : " .$jnsbrg. "<br>".
            "Nama Barang : " .$nmbrg. "<br>".
            "Harga : " .$harga. "<br>".
            "Jumlah : " .$jmlh. "<br>
            ---------------------------------------- <br>".
            "Total : " .$total. "<br>".
            "Casback : " .$cashback. "<br>".
            "Pembayaran : " .$pmbyrn. "<br>".
            "Potongan : " .$potongan. "<br>
            ---------------------------------------- <br>".
            "Total Pembayaran : " .$total2;
});

route::get('/siswa', function(){
    
    $data_siswa = ['allia', 'hana','regita','fauzan','abel'];

    return view('tampil',compact('data_siswa'));

});

// routing dengan model 
// route::get('/post', function(){

//     $post = post::all();
//     return view('tampil_post', compact('post'));
// });

// route::get('/barang', function(){

//     $barang = barang::all();
//     return view('tampil_barang', compact('barang'));
// });

// route::get('/barang', function(){

//     // $barang = barang::where('merk','LIKE','%SAMSUNG')->get();
//     $barang = barang::where('id',3)->get();
//     return view('tampil_barang', compact('barang'));
// });

route::get('/post',[PostsController::class, "menampilkan"]);
route::get('/barang',[PostsController::class, "menampilkan"]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('siswa', SiswasController::class);

Route::resource('ppdb', ppdbsController::class);

Route::resource('pengguna', penggunasController::class);

Route::resource('telepon', TeleponController::class);

Route::resource('kategori', kategoriController::class);

Route::resource('produk', produkController::class);

Route::resource('product', productController::class);

Route::resource('customer', customerController::class);

Route::resource('order', orderController::class);

Route::resource('penerbit', penerbitController::class);
Route::resource('genre', genreController::class);
Route::resource('pembeli', pembeliController::class);
Route::resource('buku', bukuController::class);
Route::resource('transaksi', transaksiController::class);