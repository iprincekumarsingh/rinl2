<?php

use App\Http\Controllers\web\ComplaintController;
use App\Http\Controllers\web\WebController;
use App\Models\Complain;
use App\Models\Machine;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $complainopen = Complain::where('c_status', 'pending')->get();
        $complainclose = Complain::where('c_status', 'closed')->get();
        $user = User::get();
        $machine = Machine::get();
        $hello =   $machine->count();
        // echo $hello;
        return view('dashboard', compact('hello', 'complainopen', 'complainclose', 'user'));
    })->name('dashboard');
    Route::get('/users', function () {
        $data = User::where('role', 'users')->get();
        return view('admin.users', compact('data'));
    });

    Route::get('/machine/view/{id}', function ($id) {
        // $data = Complain::where('id',$id)->get();
        $data = Machine::where('eid', $id)
            ->get();
        return view('admin.machinedata', compact('data'));
    });

    //Complain Controller
    Route::controller(ComplaintController::class)->group(function () {

        Route::get('complain/close/{id}', 'closeComplain');

        Route::get('/log/complain', 'complainview');

        Route::post('/log/complain/create', 'complain');
        Route::get('/complain/view/{id}', 'ComplainSingle');
        Route::get('/complains', 'ComplainHome');
    });
    Route::get('/scan', function () {
        return view('scanMachine');
    });

    Route::controller(WebController::class)->group(function () {

        Route::get('/addmachine', 'addm');
        Route::get('/user-machine','userViewMachine');
        Route::post('/machineadd',  'addMachine');
    });
    // qr-testing
    Route::get('/machine', function () {
        $data = Machine::get();
        return view('admin.machine', compact('data'));
    });
});


Route::get('/logout',function(){
    session()->flush();
    return redirect()->route('login');
});

// Testing Routes
#should be removed in Production

Route::get('/qr', function () {
    $data['qrcode'] = QrCode::size(600)->generate('Welcome to');
    // Store QR code for download
    QrCode::generate('Welcome to Makitweb', public_path('images/qr/mac1.svg'));
    return view('qr', $data);
});
Route::get('/generate/{id}', [WebController::class, 'generate']);
