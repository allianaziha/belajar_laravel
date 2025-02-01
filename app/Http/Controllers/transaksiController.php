<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\buku;
use App\Models\pembeli;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = buku::all();
        $pembeli = pembeli::all();
        return view('transaksi.create', compact('buku','pembeli'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required'
        ],
        [
            'jumlah.required'=> 'jumlah tidak boleh kosong',
            'tanggal_transaksi.required'=> 'tanggal transaksi tidak boleh kosong',
        ]);

        $transaksi = new transaksi;
        $transaksi->jumlah             = $request->jumlah;
        $transaksi->tanggal_transaksi  = $request->tanggal_transaksi;
        $transaksi->id_buku            = $request->id_buku;
        $transaksi->id_pembeli         = $request->id_pembeli;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transaksi::FindOrFail($id);
        $buku = buku::all();
        $pembeli = pembeli::all();
        return view('transaksi.show', compact('transaksi','buku','pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = transaksi::FindOrFail($id);
        $buku = buku::all();
        $pembeli = pembeli::all();
        return view('transaksi.edit', compact('transaksi','buku','pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required'
        ],
        [
            'jumlah.required'=> 'jumlah tidak boleh kosong',
            'tanggal_transaksi.required'=> 'tanggal transaksi tidak boleh kosong',
        ]);

        $transaksi = transaksi::FindOrFail($id);
        $transaksi->jumlah             = $request->jumlah;
        $transaksi->tanggal_transaksi  = $request->tanggal_transaksi;
        $transaksi->id_buku            = $request->id_buku;
        $transaksi->id_pembeli         = $request->id_pembeli;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::FindOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'data berhasil dihapus');
    }
}
