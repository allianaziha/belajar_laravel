<?php

use Illuminate\Support\Facades\Route;

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