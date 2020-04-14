<?php

namespace App\Http\Controllers;

use App\Config;
use App\Menu;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Braintree_Transaction;
use Braintree_ClientToken;
use Braintree\MerchantAccount;
use App\PaypalSubscription;
use Illuminate\Support\Carbon;
use Session;
use Validator;
use App\Mail\SendInvoiceMailable;

class BrainTreeController extends Controller
{  
	public function payment(Request $request)
	{
		$customer = Auth::user();

		$currency = Config::findOrFail(1)->currency_code;
		$plan = Package::findOrFail($request->plan_id);
		$account = env('BTREE_MERCHANT_ACCOUNT_ID');
		$acc = MerchantAccount::find($account);
		if(isset($acc) && ($acc->currencyIsoCode == $currency)){
			$result = Braintree_Transaction::sale([
				'amount' =>  $request->amount,
				'paymentMethodNonce' => $request->payment_method_nonce,
				'merchantAccountId' => $account,
				'options' => [
						   'submitForSettlement' => True
							 ]
		  ]);

		if ($result->success || !is_null($result->transaction)) {
			$txn = $result->transaction;
			if($txn->paymentInstrumentType == 'paypal_account'){
				$paypal = $txn->paypal;
			}
 
			$plan = Package::findOrFail($request->plan_id);
			$menus = Menu::all();
			$user_email = $customer->email;
			$com_email = Config::findOrFail(1)->w_email;
			$current_date = Carbon::now();
			$end_date = null;

			if ($plan->interval == 'month') {
				$end_date = Carbon::now()->addMonths($plan->interval_count);
			} else if ($plan->interval == 'year') {
				$end_date = Carbon::now()->addYears($plan->interval_count);
			} else if ($plan->interval == 'week') {
				$end_date = Carbon::now()->addWeeks($plan->interval_count);
			} else if ($plan->interval == 'day') {
				$end_date = Carbon::now()->addDays($plan->interval_count);
			}

			$created_subscription = PaypalSubscription::create([
				'user_id'    => $customer->id,
				'payment_id' => isset($paypal) ? $paypal['paymentId'] : $txn->id,
				'user_name' => $customer->name,
				'package_id' => $request->plan_id,
				'price'      => $txn->amount,
				'status'     => '1',
				'method'     => isset($paypal) ? 'paypal' : 'braintree',
				'subscription_from' => $current_date,
				'subscription_to' => $end_date
			]);
			if ($created_subscription) {
				try{
				Mail::send('user.invoice', ['paypal_sub' => $created_subscription, 'invoice' => null], function($message) use ($com_email, $user_email) {
					$message->from($com_email)->to($user_email)->subject('Invoice');
				});
				}catch(\Swift_TransportException $e){
					header( "refresh:5;url=./" );
					dd("Payment Successfully ! but Invoice will not sent because admin not updated the mail setting in admin dashboard ! Redirecting you to homepage... !");
				 }
			}

			if (isset($menus) && count($menus) > 0) {
			  return redirect()->route('home', $menus[0]->slug)->with('added', 'Your are now a subscriber !');
			}
			return redirect('/')->with('added', 'Your are now a subscriber !');
		} else {
			return redirect('/')->with('error', 'Payment error occured. Please try again !');
		}
		}
		else{
			return back()->with('deleted', 'Currency not supported !');
		}
	}

	public function get_bt()
	{
	  $customer = Auth::user(); 
		if(!$customer->braintree_id){
			$response = \Braintree_Customer::create([
			   'id' => 'BT0'.$customer->id
			]);

			if( $response->success) {
				$customer->braintree_id = $response->customer->id;
				$customer->save();
			}
		}
  	$client = Braintree_ClientToken::generate(["customerId" => $customer->braintree_id]);
		return response()->json(array('client' => $client));
	}
}
