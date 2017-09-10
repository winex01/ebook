<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
 	public function __construct()
 	{
 		$this->middleware('guest:admin', ['except' => ['logout']]);
 	}

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	// validate 
    	$this->validate($request, [
    		'email' => 'required:email',
    		'password' => 'required'
    	]);

    	$credentials = [
    		'email' => $request->email,
    		'password' => $request->password
    	];

    	// attemp to log in
    	if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    		// if success redirect to intended location
    		return  redirect()->intended(route('admin.dashboard'));	
    	}

    	// if unsuccess redirect back
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Log the admin user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
