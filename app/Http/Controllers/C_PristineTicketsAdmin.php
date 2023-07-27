<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Master;
use App\Models\Tickets;
use App\Models\User;

use DB;

class C_PristineTicketsAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $master = Tickets::count();

        return view('ticketsadmin.dashboard.index', compact('master'));
    }

    public function form_Register()
    {
        $tickets = Tickets::all();
        return view('ticketsadmin.register.index', compact('tickets'));
    }

    public function form_Register_delete($id)
    {
        Tickets::where('id_tickets', $id)->delete();
        return redirect('/CMS/FormRegister');
    }


}
