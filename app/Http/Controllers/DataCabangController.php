<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class DataCabangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = Cabang::with('studio')->withCount('studio')->get();
        return view('cabang.index', compact('cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required'
        ], [
            'nama_kota.required' => 'Nama cabang baru tidak boleh kosong.'
        ]);

        $save = Cabang::create([
            'nama_kota' => $request->nama_kota
        ]);
        return redirect()->route('cabang.index')->with(['message' => 'Berhasil Membuat ' . $save->nama_kota]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ceking = Cabang::with('studio')->find($id);
        $ceking->studio()->delete();
        $ceking->delete();
        return back()->with(['message' => 'Berhasil Menghapus Data Cabang']);
    }
}
