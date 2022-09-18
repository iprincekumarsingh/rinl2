<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use App\Models\Machine;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WebController extends Controller
{
    //



    public function addm()
    {
        # code...
        return view('admin.add');
    }
    public function addMachine(Request $req)
    {
        $name = $req->file('image')->getClientOriginalName();
        $qr = $req['name'] . rand(12, 3298);
        echo $qr;
        $path = $req->file('image')->store('public/images/machine');
        Machine::create(
            [
                'name' => $req['name'],
                'machine_details' => $req['machine_details'],
                'photo' => $path,
                'qr_code' => $qr,
                'geo_location' => $req['geo']
            ]
        );
        $data['qrcode'] = QrCode::size(600)->generate('Welcome to');

        // Store QR code for download
        // QrCode::generate('Welcome to Makitweb', store('images/qr/' . $qr . '.svg'));

        return view('qr', $data);
        // return back();
    }
    public function generate($id)
    {
        $data['qrcode'] = QrCode::size(600)->generate($id);
        return view('qr', $data);
    }
    
}
