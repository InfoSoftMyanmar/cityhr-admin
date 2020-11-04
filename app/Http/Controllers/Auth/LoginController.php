<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use  App\Models\Users;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{	

	use AuthenticatesUsers;
		/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

    	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	/**
	 * Create a new login view for admin.
	 *
	 * @return void
	 */
	public function getLogin(Request $request) {
		return view('login');
	}

    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
		]);
		
		$input    = $request->all();

		$remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
        
		if (Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'active' => 1])) {
			if (auth()->user()->email_verified == 0) {
				Auth::logout();
				return redirect('/')->with('error', 'Oppes! You have entered invalid credentials');
			}

			// return redirect('/')->with('error', auth()->user()->user_id);
			session(['tabpanel' => 'index']);
			Auth::login(auth()->user(), $remember_me);
			return redirect()->intended('dashboard');
		} else {
			return redirect('/')->with('error', 'Oppes! You have entered invalid credentials');
		}
    }

	public function logout() {
		Auth::logout();
		return redirect('/');
	}
}
