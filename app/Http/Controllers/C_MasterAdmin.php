<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\User;

use DB;

class C_MasterAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $master = Master::count();
        $chartUser = Master::select(DB::raw("COUNT(*) as count"))
        ->whereYear("created_at", date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');


        return view('masteradmin.dashboard', compact('master', 'chartUser'));
    }

    ## Master
    public function master()
    {
        $master = Master::OrderByDesc('created_at')->get();
        return view('masteradmin.master.master', compact('master'));
    }

    public function masteradd()
    {
        return view('masteradmin.master.master_add');
    }

    public function masterstore(request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

       $description = $request->description;
       $dom = new \DomDocument();
       $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $imageFile = $dom->getElementsByTagName('img');

       foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);

           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }

       $description = $dom->saveHTML();

        $image = $request->file('image');
        $images = time()."_".$image->getClientOriginalName();
        $tujuan_upload = 'img/Master';
        $image->move($tujuan_upload,$images);

        Master::create([
            'image' => $images,
            'judul_master' => $request->judul_master,
            'judul_master_slug' => Str::slug($request->judul_master, '-'),
            'description' => $description,
            'mselect' => $request->mselect,
            'mselectmultiple' => implode(',', $request->mselectmultiple),
            'mcheckbox' => implode(',', $request->mcheckbox),
            'mradiobutton' => implode(',', $request->mradiobutton),
        ]);

        return redirect('/CMS/master');
    }

    public function masteredit($id)
    {
        $master = Master::where('id_master', $id)->get();
        return view('masteradmin.master.master_edit', compact('master'));
    }

    public function masterupdate(request $request)
    {
        $description = $request->description;
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | libxml_use_internal_errors(true));
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            if (strpos($data, ';') === false) {
                continue;
            }
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();


        if($request->file('image') == null){
            $image = $request->images;
        }
        else{
            $file_image = $request->file('image');

            $image = time()."_".$file_image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'img/Master';
            $file_image->move($tujuan_upload,$image);
        }

        Master::where('id_master', $request->id)->update([
            'image' => $image,
            'judul_master' => $request->judul_master,
            'judul_master_slug' => Str::slug($request->judul_master, '-'),
            'description' => $description,
            'mselect' => $request->mselect,
            'mselectmultiple' => $request->mselectmultiple,
            'mcheckbox' => $request->mcheckbox,
            // 'mradiobutton' => implode(',', $request->mradiobutton),
        ]);

        return redirect('/CMS/master');
    }

    public function masterdelete($id)
    {
        Master::where('id_master', $id)->delete();
        return redirect('/CMS/master');
    }
}
