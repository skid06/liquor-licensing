<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

use App\Events\NewApplication;
use App\LiquorApplication;
use App\Payment;
use Carbon\Carbon;

class ApplicationPaymentController extends Controller
{
    protected $payment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
        // $this->middleware('auth', ['except' => 'filterPaymentByDate']);
        $this->middleware('auth')->except(["filterPaymentByDate","showPayments","index"]);
    }

    public function index()
    {
        return response()->json([ "payments" => $this->payment->with(["user", "application"])->get()]);
    }

    public function showPayments()
    {
        return view('payments');
    }

    public function getPaymentPage(Request $request)
    {
        $data['id'] = $request->id;
        // return view('application-payments', $data);
        return view('payment', $data);
    }

    public function charge(Request $request)
    {
        try {
            $charge = Stripe::charges()->create([
                'amount' => $request->cost,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Liquor Application Fee',
                'receipt_email' => $request->email
            ]);
            
            $app = LiquorApplication::find($request->id);
            $app->status = 'paid';
            $app->save();

            $payment = new Payment;
            $payment->user_id = \Auth::user()->id;
            $payment->application_id = $request->id;
            $payment->amount = $request->cost;
            $payment->balance_transaction = $charge['balance_transaction'];
            $payment->description = $charge['description'];
            $payment->brand = $charge['source']['brand'];
            $payment->exp_month = $charge['source']['exp_month'];
            $payment->exp_year = $charge['source']['exp_year'];
            $payment->name_on_card = $charge['source']['name'];
            $payment->save();

            // Send Email Alert to admins
            event(new NewApplication($app));

            return response()->json(["message" => "Thank you! Your payment has been accepted.", "data" => $charge]);

        } catch (CardErrorException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function filterPaymentByDate(string $by, int $count)
    {
        // return Carbon::now();
        // return \App\Payment::sum('amount')
        if($by === 'day'){
            if(is_numeric($count) && $count >= 1){
                return $this->payment->whereDate('created_at', '>=', Carbon::now()->subDays($count))->sum('amount');
            }
            
        }
        elseif($by === 'month'){
            if(is_numeric($count) && $count >= 1){
                return $this->payment->whereDate('created_at', '>=', Carbon::now()->subMonths($count))->sum('amount');
            }         
        }
        elseif($by === 'year'){
            if(is_numeric($count) && $count >= 1){
                return $this->payment->where('created_at', '>=', Carbon::now()->subYears($count))->sum('amount');
            }           
        }
        else{
            return 'Parameters not allowed.';
        }              
    }    
}
