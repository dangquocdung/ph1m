<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\PaypalSubscription;
use App\Package;
use App\Menu;
use App\User;
use App\Config;
use App\HeaderTranslation;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
use Stripe\Stripe;
use Stripe\Customer;
use Notification;

use App\Notifications\MyNotification;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated()
    {
      $auth = Auth::user();
         $config=Config::first();
      if ($config->free_sub==1) {
        $ps=PaypalSubscription::where('user_id',$auth->id)->first();
        if ($auth->is_admin!=1) {          
          if (!isset($ps) ) {
            $header_translations = HeaderTranslation::all(); 
            $config=Config::first();
            $start=Carbon::now();
            $end=$start->addDays($config->free_days);
            $payment_id=mt_rand(10000000000000, 99999999999999);
            $subscribed = 1;
            $created_subscription = PaypalSubscription::create([
              'user_id' => $auth->id,
              'payment_id' => $payment_id,
              'user_name' => $auth->name,
              'package_id' => 0,
              'price' => 0,
              'status' => 1,
              'method' => 'free',
              'subscription_from' => Carbon::now(),
              'subscription_to' => $end
            ]);
            $to= Str::substr($ps['subscription_to'],0, 10);
            $from= Str::substr($ps['subscription_from'],0, 10);
            $desc=$header_translations->where('key', 'Free Trial Text')->first->value->value.' '.$from.' to '.$to;
            $title=$config->free_days.' Days '.$header_translations->where('key', 'Free Trial')->first->value->value;
          
            $movie_id=NULL;
            $tvid=NULL;
            $user=$auth->id;
            User::findOrFail($auth->id)->notify(new MyNotification($title,$desc,$movie_id,$tvid,$user));
          }
        }
      }
      $subscribed = null;
      if ( $auth->is_admin ==1 ) {// do your margic here
         $subscribed = 1;
         return redirect('/admin');
       }else if(Auth::user()->is_blocked ==1){
        Auth::logout();
            return back()->with('deleted','You Do Not Have Access to This Site Anymore. You are Blocked.');
       } 
       else{
        $current_date = Carbon::now()->toDateString();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        if ($auth->stripe_id != null) {
          $customer = Customer::retrieve($auth->stripe_id);
        }
        $paypal = PaypalSubscription::where('user_id',$auth->id)->orderBy('created_at','desc')->first(); 
        if (isset($customer)) {         
          $alldata = $auth->subscriptions;
          $data = $alldata->last();      
        } 
        if (isset($paypal) && $paypal != null && $paypal->count() >0) {
          $last = $paypal;
        } 
        $stripedate = isset($data) ? $data->created_at : null;
        $paydate = isset($last) ? $last->created_at : null;
        if($stripedate > $paydate){
          if($auth->subscribed($data->name) && date($current_date) <= date($data->subscription_to)){
            $subscribed = 1;
            if($data->ends_at != null){
              return redirect('/')->with('deleted', 'Please resume your subscription!');
            }  
            else{
              $planmenus= DB::table('package_menu')->where('package_id', $data->stripe_plan)->get();
             if(isset($planmenus)){ 
                foreach ($planmenus as $key => $value) {
                 $menus[]=$value->menu_id;
               }
             }
             if(isset($menus)){ 
               $nav_menus=Menu::whereIn('id',$menus)->get();
               foreach ($nav_menus as $nav => $menus) {
                return redirect($menus->slug);
              }
            }                     
          }
          } else {
            return redirect('/')->with('deleted', 'Your subscription has been expired!');
          }
        }
        elseif($stripedate < $paydate){
          if (date($current_date) <= date($last->subscription_to)){
            if($last->status == 1) {
              $subscribed = 1;
              $planmenus= DB::table('package_menu')->where('package_id', $last->plan['plan_id'])->get();
              if(isset($planmenus)){ 
                  foreach ($planmenus as $key => $value) {
                   $menus[]=$value->menu_id;
                 }
               }
               if(isset($menus)){ 
                 $nav_menus=Menu::whereIn('id',$menus)->get();
                 foreach ($nav_menus as $nav => $menus) {
                  return redirect($menus->slug);
                }
              } 
            }
            else{
              return redirect('/')->with('deleted', 'Please resume your subscription!');
            }                    
          } else {
            $last->status = 0;
            $last->save();
            return redirect('/')->with('deleted', 'Your subscription has been expired!');
          }
        }
        else{
          return redirect('account/purchaseplan')->with('deleted', 'You have no subscription please subscribe');

        }
      }
}
protected function credentials(Request $request)
    {
      $config = Config::first();
      if ($config->verify_email==1) {
       return [
            'email'    => $request->email,
            'password' => $request->password,
            'status' => 1,
        ];
      }else{
         return [
            'email'    => $request->email,
            'password' => $request->password,
           
        ];
      }
     


    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
  }
