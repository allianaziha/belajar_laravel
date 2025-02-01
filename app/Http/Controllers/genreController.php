<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genre;

class genreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = genre::all();
        return view('genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
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
            'genre' => 'required'
        ],
        [
            'genre.required'=> 'genre tidak boleh kosong'
        ]);

        $genre = new genre;
        $genre->genre  = $request->genre;
        $genre->save();

        return redirect()->route('genre.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = genre::FindOrFail($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = genre::FindOrFail($id);
        return view('genre.edit', compact('genre'));
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
            'genre' => 'required'
        ],
        [
            'genre.required'=> 'genre tidak boleh kosong'
        ]);

        $genre = genre::FindOrFail($id);
        $genre->genre  = $request->genre;
        $genre->save();

        return redirect()->route('genre.index')->with('success', 'data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = genre::FindOrFail($id);
        $genre->delete();
        return redirect()->route('genre.index')->with('success', 'data berhasil dihapus');
    }
}
