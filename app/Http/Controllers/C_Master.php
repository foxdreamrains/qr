<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
// dummytest
use App\Models\products;

use App\Models\Tickets;



class C_Master extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function master()
    {
        return view('master.home');
    }

    public function generateQR()
    {
        $products = products::all();
        return view('generateqr.index', compact('products'));
    }

    public function generateQR_create()
    {
        return view('generateqr.create');
    }

    public function generateQR_store(Request $request)
    {
        $number = mt_rand(1000000000,9999999999);

        $request['product_code'] = $number;
        if($this->productCodeExists($number)){
            $number = mt_rand(1000000000,9999999999);
        }

        products::create($request->all());

        return redirect('/');
    }

    public function productCodeExists($number)
    {
        return products::whereProductCode($number)->exists();
    }

    public function generateQR_edit()
    {
        return view('generateqr.edit');
    }

    public function generateQR_delete($id)
    {
        products::where('id_products', $id)->delete();
        return redirect('/');
    }

    //UNTUK CONTACT US

  //   public function sendcontactus(request $request)

  //   {

  //     $request->validate([

  //         'name' => 'required',

  //         'email' => 'required|email',

  //         'phone' => 'required',

  //         'subject' => 'required',

  //         'message' => 'required',

  //     ]);

  //     $input = $request->all();

  //        //  Send mail to admin

  //     \Mail::send('emails/maknala', array(

  //       'name' => $input['name'],

  //       'email' => $input['email'],

  //       'phone' => $input['phone'],

  //       'subject' => $input['subject'],

  //       'message' => $input['message'],

  //   ), function($message) use ($request){

  //       $message->from($request->email);

  //       $message->to("maknala@arteegroup.id", "Maknala")->subject($request->get('subject'));

  //   });



  //     return redirect()->back()->with(['success' => 'Thank you for your message, we will reply to your message 3 x 24 hours.']);

  // }
}
