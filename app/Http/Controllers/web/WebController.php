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

    public function complainview(Request $request)
    {
        return view('complain');
    }
    public function complain(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',

        ]);

        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');
        $rand = rand(12223, 235343);

        Complain::create(
            [
                'title' => $request['title'],
                'complaint_number' => $rand,
                'description' => $request['desc'],
                'photo' => $path,
                'eid' => 1,
                'name' => Auth::user()->name,
                'c_status' => 'pending'

            ]
        );
    }
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
        $path = $req->file('image')->store('uploads/machine/');
        Machine::create(
            [
                'name' => $req['name'],
                'machine_details' => $req['machine_details'],
                'photo' => $path,
                'qr_code' => $qr,


            ]
        );
        $data['qrcode'] = QrCode::size(600)->generate('Welcome to');

        // Store QR code for download
        // QrCode::generate('Welcome to Makitweb', store('images/qr/' . $qr . '.svg'));

        // return view('qr',$data);
        return back();
    }
}
