<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Application;
use App\Payment;

class ApplicationPaymentController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function getPaymentPage(Request $request)
    {
        $data['id'] = $request->id;
        return view('application-payments', $data);
    }

    public function charge(Request $request)
    {
        try{
            $charge = Stripe::charges()->create([
                'amount' => 35.00,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Liquor Application Fee',
                'receipt_email' => $request->email
            ]);
            
            $app = Application::find($request->id);
            $app->status = 'paid';
            $app->save();

            // return $charge;
            $payment = new Payment;
            $payment->user_id = \Auth::user()->id;
            $payment->application_id = $request->id;
            $payment->amount = 35.00;
            $payment->balance_transaction = $charge['balance_transaction'];
            $payment->description = $charge['description'];
            $payment->brand = $charge['source']['brand'];
            $payment->exp_month = $charge['source']['exp_month'];
            $payment->exp_year = $charge['source']['exp_year'];
            $payment->name_on_card = $charge['source']['name'];
            $payment->save();

            return response()->json(["message" => "Thank you! Your payment has been accepted.", "data" => $charge]);
            // return back()->with('success_message', 'Thank you! Your payment has been accepted.');

        } catch (CardErrorException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
