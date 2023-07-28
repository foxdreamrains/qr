<?php

namespace App\Http\Controllers;

use App\Mail\QrCodeMail;
use App\Models\Cabang;
use App\Models\Studios;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tickets;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class C_PristineTickets extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showqr()
    {
        $tickets = Tickets::all();
        return view('register.index', compact('tickets'));
    }

    public function registerqr_delete($id)
    {
        Tickets::where('id_tickets', $id)->delete();
        return redirect('/');
    }

    public function create()
    {
        $cabang = Cabang::with('studio')->get();
        return view('register.qr', compact('cabang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required|unique:tickets',
            'email' => 'required|unique:tickets',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'cabangs_id' => 'required',
            'studios_id' => 'required',
            'kota' => 'required'
        ]);

        $user = Tickets::create([
            'tickets_code' => Str::random(10),
            'cabangs_id' => $request->cabangs_id,
            'studios_id' => $request->studios_id,
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'email' => $request->email,
            'kode_pos' => $request->kode_pos,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kota' => $request->kota
        ]);

        $code_ticket = $user->tickets_code;

        $qrcode = QrCode::size(300)->generate($code_ticket);
        $barcode = DNS2D::getBarcodePNG($code_ticket, 'QRCODE', 5, 5);

        Mail::to($user->email)->send(new QrCodeMail($user, $barcode));

        return redirect()->back()->with(['message' => 'Berhasil Mendaftar. Silahkan cek email anda untuk melihat ticket']);
    }

    public function cekCabangs(Request $request)
    {
        $cabangs_id = $request->cabangs_id;
        $studio = Studios::withCount('ticket')->where('cabangs_id', $cabangs_id)->get();

        foreach ($studio as $value) {
            $value->tgl = Carbon::parse($value->tgl)->translatedFormat('l, d-F-Y');
            $value->jam_mulai = Carbon::parse($value->jam_mulai)->translatedFormat('H:i');
            $value->jam_selesai = Carbon::parse($value->jam_selesai)->translatedFormat('H:i');
        }
        return response()->json(['data' => $studio]);
    }

    public function cekNoKtp(Request $request)
    {
        $noKtp = $request->no_ktp;

        $ceking = Tickets::isKtpNumberExists($noKtp);

        if (!$ceking) {
            return response()->json(['code' => 200]);
        } else {
            return response()->json(['code' => 400]);
        }
    }
}
