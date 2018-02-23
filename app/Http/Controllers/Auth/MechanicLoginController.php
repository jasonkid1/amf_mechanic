<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mechanic;
use Auth;

class MechanicLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:mechanic', ['except' => ['logout']]);
	}

    public function showLoginForm()
    {
    	return view('auth.mechanic-login');
    }

    public function showRegisterForm()
    {
        return view('auth.register-mechanic');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if (Auth::guard('mechanic')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('mechanic.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'password'));
    }

    public function submitRegisterForm(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string'
        ]);

        $mechanic = Mechanic::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/mechanic');
    }

    public function logout()
    {
        Auth::guard('mechanic')->logout();

        return redirect('mechanic/login');
    }
}
