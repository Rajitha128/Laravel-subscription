<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function payment()
    {
        $availablePlans =[
            'box1' => "box1",
         ];

        $data=[
            'intent' => auth()->user()->createSetupIntent(),
            'plans' => $availablePlans
        ];
        return view('payment')->with($data);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->payment_method;
        $planId = $request->plan;

        // try{

            $user->newSubscription('main', $planId)->create($paymentMethod);

            return response([
                'success_url'=> redirect()->intended('/home')->getTargetUrl(),
                'message'=>'success'
            ]);

        // }catch(Exception $e){
        //     return redirect()->route('payments')->with('status', 'Something went wrong. please try again');
        // }

    }
}
