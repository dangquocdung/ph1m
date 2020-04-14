<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multiplescreen;
use Session;

class MultipleScreenController extends Controller
{
    public function update(Request $request,$id)
    {
    	

    	$query = Multiplescreen::where('user_id',$id)->update(['activescreen' => $request->defscreen]);

    	Session::put('nickname',$request->defscreen);

    	if($query){
    		return back()->with('added',"$request->defscreen is now Active Profile !");
    	}else {
    		return back()->with('deleted',"Something Went Wrong ! Please Try again !");
    	}


    }

    public function newupdate(Request $request,$id){
        $query = Multiplescreen::where('user_id',$id)->update(['activescreen' => $request->screen]);

        Session::forget('nickname');
        Session::put('nickname',$request->screen);

        if($query){
            return "$request->screen is now Active Profile !";
        }else {
            return "Something Went Wrong ! Please Try again !";
        }
    }

    public function manageprofile($id)
    {
        $result = Multiplescreen::where('user_id',$id)->first();
        return view('manageprofile',compact('result'));
    }

    public function updateprofile(Request $request, $id){

        $result = Multiplescreen::where('user_id',$id)->first();

        if($request->screen2 != null || $request->screen2 != '')
        {
            $result->screen2 = $request->screen2;
        }

        if($request->screen3 != null || $request->screen3 != ''){
            $result->screen3 = $request->screen3;
        }

        if($request->screen4 != null || $request->screen4 != ''){
            $result->screen4 = $request->screen4;
        }

        if($request->screen5 != null || $request->screen5 != ''){
            $result->screen5 = $request->screen5;
        }

        if($request->screen6 != null || $request->screen6 != ''){
            $result->screen6 = $request->screen6;
        }
        
        
        $result->save();

        return back()->with('updated','Profile Updated Successfully !');
    }
}
