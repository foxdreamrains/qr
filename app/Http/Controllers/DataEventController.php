<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Studios;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class DataEventController extends Controller
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
        $studios = Studios::with('cabang', 'ticket')->withCount('ticket')->get();
        return view('dataEvent.index', compact('studios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = Cabang::all();
        return view('dataEvent.create', compact('cabang'));
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
            'cabangs_id' => 'required',
            'nama_studio' => 'required',
            'tgl' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ], [
            'cabangs_id.required' => 'Pilih cabang yang akan mengadakan event.',
            'nama_studio.required' => 'Nama studio yang akan di adakan event tidak boleh kosong.',
            'tgl.required' => 'Tanggal di adakannya event tidak boleh kosong.',
            'jam_mulai.required' => 'Atur jam mulai event',
            'jam_selesai.required' => 'Atur jam selesai event'
        ]);

        $save = Studios::create([
            'cabangs_id' => $request->cabangs_id,
            'nama_studio' => $request->nama_studio,
            'tgl' => $request->tgl,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ]);

        return redirect()->route('event.index')->with(['message' => 'Berhasil Membuat Event Baru.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_studio)
    {
        $cabang = Cabang::all();
        $studios = Studios::with('cabang')->where('id_studio', $id_studio)->get();
        return view('dataEvent.edit', compact('studios', 'cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_studio)
    {
        $request->validate([
            'cabangs_id' => 'required',
            'nama_studio' => 'required',
            'tgl' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ], [
            'cabangs_id.required' => 'Pilih cabang yang akan mengadakan event.',
            'nama_studio.required' => 'Nama studio yang akan di adakan event tidak boleh kosong.',
            'tgl.required' => 'Tanggal di adakannya event tidak boleh kosong.',
            'jam_mulai.required' => 'Atur jam mulai event',
            'jam_selesai.required' => 'Atur jam selesai event'
        ]);

        $ceking = Studios::where('id_studio', $id_studio)->update([
            'cabangs_id' => $request->cabangs_id,
            'nama_studio' => $request->nama_studio,
            'tgl' => $request->tgl,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ]);

        return redirect()->route('event.index')->with(['message' => 'Berhasil Mengubah Data Event.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_studio)
    {
        $studios = Studios::with('ticket')->where('id_studio', $id_studio)->delete();
        return redirect()->route('event.index')->with(['message' => 'Berhasil Menghapus Data Event.']);
    }
}
