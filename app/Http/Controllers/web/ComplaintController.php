<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    //


    public function closeComplain($id)
    {

        Complain::where('id', $id)
            ->update(['c_status' => 'closed']);
        return redirect('complains');
    }

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
    public function complainSingle($id)
    {
        $data = DB::table('machines')
            ->join('complains', 'machines.eid', '=', 'complains.eid')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('complains.eid', '=', $id)
            ->select('complains.*', 'machines.name as Mname')
            ->get();
        // echo "<pre>";
        // echo $data;
        return view('admin.complaindata', compact('data'));
    }
    public function ComplainHome(){
        $data = Complain::get();
        return view('admin.complaint', compact('data'));
    }
}
