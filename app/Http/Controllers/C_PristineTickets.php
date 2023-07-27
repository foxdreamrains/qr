<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Tickets;
use App\Models\Products;


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

    public function registerqr()
    {
        $ticketsCabangJakarta = Tickets::where('studio', 'Cabang-Jakarta-15-00')->where('event_date', '2023-07-24')->count();
        $set_eventdate = "2023-07-24";
        return view('register.qr', compact('ticketsCabangJakarta', 'set_eventdate'));
    }

    public function registerqr_success()
    {
        return view('register.success');
    }

    public function registerqr_store(request $request)
    {
        // $current = Carbon::now();
        // $current->format('M d Y');
        // if($request->eventdate == $current){

        // }
        $tickets_code = mt_rand(1000000000,9999999999);

        Tickets::create([
            'tickets_code' => $tickets_code,
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'email' => $request->email,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'event_date' => $request->event_date,
            'studio' => $request->studio,
        ]);

        return redirect('/registerqr')->with('success','Pendaftaran Event telah berhasil, silahkan cek Email kamu sekarang');
    }

    //UNTUK Send QR

    public function sendregisterqr(request $request)
    {

      $tickets_code = mt_rand(1000000000,9999999999);

      Tickets::create([
        'tickets_code' => $tickets_code,
        'nama' => $request->nama,
        'ktp' => $request->ktp,
        'email' => $request->email,
        'kode_pos' => $request->kode_pos,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'event_date' => $request->event_date,
        'studio' => $request->studio,
    ]);

      $request->validate([

          'nama' => 'required',

          'email' => 'required|email',

      ]);

      $input = $request->all();

         //  Send mail to admin

      \Mail::send('emails/qr', array(

        'tickets_code' => $tickets_code,

        'nama' => $input['nama'],

        'email' => $input['email'],

        'ktp' => $input['ktp'],

        'tgllahir' => $input['tgllahir'],

        'location' => $input['location'],

    ), function($message) use ($request){

        $message->from($request->email);

        $message->to("alfasauchiha261@gmail.com", "Tickets Pristine ###")->subject("Tickets Pristine ###");

    });



      return redirect()->back()->with(['success' => 'Thank you for your message, we will reply to your message 3 x 24 hours.']);

  }

  public function registerqr_delete($id)
    {
        Tickets::where('id_tickets', $id)->delete();
        return redirect('/');
    }
}
