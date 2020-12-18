<?php

use App\Events\DeletePaymentNotification;
use App\Events\eventTrigger;
use App\Events\NotifPusherEvent;
use App\Events\SendGlobalNotification;
use App\Http\Controllers\PaymentController;
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

// Route::get('/', function () {
//     return view('payment.index');
// });
Route::get('/', [PaymentController::class,'get']);
Route::get('/addpayment',[PaymentController::class,'addpayment']);


    
