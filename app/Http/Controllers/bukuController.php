<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\genre;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = penerbit::all();
        $genre = genre::all();
        return view('buku.create', compact('penerbit','genre'));
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
            'nama_buku' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'required',
            'tanggal_terbit' => 'required'
        ],
        [
            'nama_buku.required'=> 'nama buku tidak boleh kosong',
            'harga.required'=> 'harga tidak boleh kosong',
            'stok.required'=> 'stok tidak boleh kosong',
            'image.required'=> 'image tidak boleh kosong',
            'tanggal_terbit.required'=> 'tanggal terbit tidak boleh kosong',
            
        ]);

        $buku = new buku;
        $buku->nama_buku       = $request->nama_buku;
        $buku->harga           = $request->harga;
        $buku->stok            = $request->stok;
        $buku->image           = $request->image;
        $buku->id_penerbit     = $request->id_penerbit;
        $buku->tanggal_terbit  = $request->tanggal_terbit;
        $buku->id_genre        = $request->id_genre;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = buku::FindOrFail($id);
        $penerbit = penerbit::all();
        $genre = genre::all();
        return view('buku.show', compact('buku','penerbit','genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::FindOrFail($id);
        $penerbit = penerbit::all();
        $genre = genre::all();
        return view('buku.edit', compact('buku','penerbit','genre'));
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
            'nama_buku' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'required',
            'tanggal_terbit' => 'required'
        ],
        [
            'nama_buku.required'=> 'nama buku tidak boleh kosong',
            'harga.required'=> 'harga tidak boleh kosong',
            'stok.required'=> 'stok tidak boleh kosong',
            'image.required'=> 'image tidak boleh kosong',
            'tanggal_terbit.required'=> 'tanggal terbit tidak boleh kosong',
            
        ]);

        $buku = buku::FindOrFail($id);
        $buku->nama_buku       = $request->nama_buku;
        $buku->harga           = $request->harga;
        $buku->stok            = $request->stok;
        $buku->image           = $request->image;
        $buku->id_penerbit     = $request->id_penerbit;
        $buku->tanggal_terbit  = $request->tanggal_terbit;
        $buku->id_genre        = $request->id_genre;

        if ($request->hasFile('image')) {
            $buku->deleteImage();
            $img = $request->file('image');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = buku::FindOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'data berhasil dihapus');
    }
}
