<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_Model\Mechanic;
use App\User;
use Auth;
use Image;
use DB;
use Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mechanics = Mechanic::paginate(5);

        return view('home', array('user' => Auth::user()), compact('mechanics'));

    }

    public function searchMechanics(Request $request)
    {
        $q = $request->q;
        if($q != ""){
        $mechanics = Mechanic::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
        $pagination = $mechanics->appends ( array (
                    'q' => $request->q
            ) );
        if (count ( $mechanics ) > 0)
            return view ( 'home',array('user' => Auth::user()),compact('mechanics') )->withMechanics($mechanics);
        }
       return redirect('home')->with('status', 'No nearby available mechanic found.');
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'.$filename));

            $user = Auth::user();
            $user->avatar = $filename;

            $user->save();

            
        }else{
            return redirect()->intended('/home');
        }

        return redirect()->intended('/home');
    }

    public function mechanicProfile($mec)
    {
        $mechanic_profile = Mechanic::find($mec);

        return view('user_pages.mechanic-profile', compact('mechanic_profile'));
    }

    public function userProfile()
    {

        return view('user_pages.user-profile', array('user' => Auth::user()));
    }

    public function changePassword()
    {
        return view('user_pages.change-password', array('user' => Auth::user()));
    }

    public function submitChangePassword(Request $request)
    {

        // if registered from social media
        if (Auth::user()->password == NULL) {
            if ($request->get('new-password') != $request->get('new-password_confirmation')) {
                //Current password and new password are same
                return redirect()->back()->with("error","Confirm Password does not match.");
            }

            $validatedData = $request->validate([
                'new-password_confirmation' => 'required',
                'new-password' => 'required|string|min:6|confirmed',
            ]);
     
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
     
            return redirect()->back()->with("success","Password changed successfully !");
        }else{
            // if registered fro form
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            }

            if ($request->get('new-password') != $request->get('new-password_confirmation')) {
                //Current password and new password are same
                return redirect()->back()->with("error","Confirm Password does not match.");
            }
     
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
     
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:6|confirmed',
            ]);
     
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
     
            return redirect()->back()->with("success","Password changed successfully !");
        }
    }

    public function editProfile()
    {
        return view('user_pages.edit-profile', array('user' => Auth::user()));
    }

    public function submitEditProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        $user = Auth::user();

        $user->update($request->all());

        return redirect()->back()->with("success","Profile successfully updated!");
    }
}
