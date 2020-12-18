<?php

namespace App\Http\Controllers;

use App\Events\DeletePaymentNotification;
use App\Jobs\DeletePayment;
use App\Models\Payment;
use App\Notifications\DeleteNotification;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    function apiPost(Request $request){
        $request->validate([
            'payment_name'=>'required'
        ]);
        $payment = new Payment;
        $payment->payment_name = $request->payment_name;
        $payment->save();
        
        return response()->json(
            [
                "message"=>"post method Success",
                "data"=>$payment
            ]
        );
    }
    function apiGet(){
        $payment = Payment::all();
        return response()->json(
            [
                "message"=>"post method Success",
                "data"=> $payment
            ]
        );
    }

    function apiDelete(Request $request){
        $data = $request->pilih;
        $sum = count($data);

        for($x=0;$x<$sum;$x++){
            $delete = DB::table('payments')->where('id',$data[$x]);
            $job = (new DeletePayment($data[$x]))->delay(Carbon::now()->addSeconds(5));
            $jobId=dispatch($job);
        }
        return redirect('/')->with("status", "Job Deleted");
    }

    function post(Request $request){
        $request->validate([
            'payment_name'=>'required'
        ]);
        Payment::create($request->all());
        return redirect('/');
    }
    function addpayment(){
        return view('payment.addpayment');
    }
    function get(){
        $payment = Payment::paginate(5);
        return response()->view('payment.index', compact('payment'));
    }

}
