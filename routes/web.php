<?php

use App\Http\Controllers\web\WebController;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/users', function () {
        $data = User::where('role', 'users')->get();
        return view('admin.users', compact('data'));
    });
    Route::get('/complains', function () {
        return view('admin.complaint');
    });

    Route::get('/scan',function(){
        return view('scanMachine');
    });
    Route::get('/log/complain',[WebController::class,'complainview']);
    Route::post('/log/complain/create',[WebController::class,'complain']);


    // qr-testing
    Route::get('/addmachine',[WebController::class,'addm']);
    Route::post('/machineadd',[WebController::class,'addMachine']);
});

Route::get('/qr',function(){
     $data['qrcode'] = QrCode::size(600)->generate('Welcome to');

    // Store QR code for download
    QrCode::generate('Welcome to Makitweb', public_path('images/qr/mac1.svg') );
    return view('qr',$data);

});
// Route::get('/')
