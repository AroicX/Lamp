<?php

namespace App\Http\Controllers;

use App\User;
use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
 public function index()
    {
        $user = Auth::User();
        $transactions = Transactions::where('user_id', '=', Auth::user()->id)->paginate(4);

     return view('home',compact('transactions',$transactions));
    }

    public function purchase() {
        return view('client/Purchase'); 
    }

    public function Profile() {
       $user = Auth::User();
       $transaction = Transactions::where('user_id', '=', Auth::user()->id)->get();

       return view('client/profile',compact('transaction',$transaction));
    }

    public function UpdateProfile(Request $request)
    {
        // return $request->all();
        $action = $request->action;
        $user = Auth::user()->id;
        $id = Auth::user()->id;
        $cpassword = $request->oldpassword;
        $newpassword = $request->password;
        $cnewpassword = $request->cnewpassword;
        $data = array('name' => $request->name, 'mobile' => $request->mobile,'email' => $request->email);

        switch ($action) {
            case 'update':
            // return $request->all();

            User::where('id', '=', $user)->update($data);

            $notification = array(

                'message' => 'Successful... !',
                'alert' => 'success' 
            );
            return redirect()->back()->with($notification);
               
                break;

             case 'password':
            // return $request->all();

                if (User::where('id', $id)){
                    // dd(Hash::check($cpassword, Auth::user()->password));
                    if (Hash::check($cpassword, Auth::user()->password, [])) {
                       
                        if($newpassword == $cnewpassword){
                            $userInfo = array(
                                'password' => bcrypt($newpassword),
                            );

                            User::where('id', $id)->update($userInfo);

                            $notification = array(

                                'message' => 'Successful... You Have Channged your Password !',
                                'alert' => 'success' 
                            );
                            return redirect()->back()->with($notification);
                        }else{

                            $notification = array(

                                'message' => 'New Password & Confirm Password No Match ',
                                'alert' => 'info' 
                            );
                            return redirect()->back()->with($notification);
                        }
                    }else{

                        $notification = array(

                            'message' => 'Old Password is invaild ',
                            'alert' => 'error' 
                        );
                        return redirect()->back()->with($notification);
                    }
                }
               
                break;
            
            default:
                # code...
                break;
        }
        
      
    }

    public function Transcations() {
       $user = Auth::User();
       $transaction = Transactions::where('user_id', '=', Auth::user()->id)->get();

       return view('client/transactions',compact('transaction',$transaction));
    }
}
