<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AbsensiQrController extends Controller
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
        if (request()->ajax()) {
            $data = Absensi::with('ticket', 'studio', 'cabang')->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('jam_masuk', function ($row) {
                    $jam = Carbon::parse($row->jam_masuk)->format('H:i');
                    return $jam;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="dropdown">
                                <button class="btn btn-info dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    - Pilih
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:void(0)" id="reset" data-tickets="' . $row->tickets_id . '" data-id="' . $row->id . '">Reset Absensi</a>
                                </div>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['action', 'jam_masuk'])
                ->toJson();
        }
        return view('absensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $qrText = $request->decodedText;
        $ticket = Tickets::with('studio', 'cabang')->where('tickets_code', $qrText)->get();
        foreach ($ticket as $value) {
            if ($value->status == 0) {
                $value->status = 'Belum Hadir';
            } else {
                $value->status = 'Hadir';
            }
            $value->studio->jam_mulai = Carbon::parse($value->studio->jam_mulai)->format('H:i');
            $value->studio->jam_selesai = Carbon::parse($value->studio->jam_selesai)->format('H:i');
            $value->studio->tgl = Carbon::parse($value->studio->tgl)->translatedFormat('l, d-F-Y');
        }

        if ($ticket[0]->status == 'Hadir') {
            return response()->json(['status' => 'Peserta Telah Melakukan Absensi.', 'code' => 400]);
        }
        return response()->json($ticket);
    }

    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saveAbsensi = Absensi::create([
            'cabangs_id' => $request->cabangs_id,
            'studios_id' => $request->studios_id,
            'tickets_id' => $request->tickets_id,
            'jam_masuk' => Carbon::now()->format('H:i:s')
        ]);

        $updateStatusTickets = Tickets::where('id_tickets', $request->tickets_id)->update([
            'status' => 1
        ]);
        return response()->json(['message' => 'Berhasil melakukan absensi pada event ini.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $id_tickets = $request->tickets_id;

        Tickets::where('id_tickets', $id_tickets)->update([
            'status' => 0
        ]);

        $reset = Absensi::with('ticket')->find($id);
        $reset->delete();
        return response()->json(['message' => 'Berhasil mereset absensi peserta']);
    }
}
