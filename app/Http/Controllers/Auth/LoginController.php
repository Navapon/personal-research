<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Adldap\Laravel\Facades\Adldap;

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


    public function username ()
    {
        return 'u_username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function authenticate (Request $request)
    {


        $username = $request->u_username;
        $password = $request->password;

        if (Adldap::auth()->attempt($username, $password)) {

            // Authentication passed from Ldap ...
            $user = User::where('u_username', $request->input('u_username'))->first();

            if (!empty($user) && Auth::loginUsingId($user->u_id)) {

                return redirect()->route('profile.edit', $user->u_id);

            } else {

                return redirect()->intended('register');

            }

        } else if (Auth::attempt([ 'u_username' => $username, 'password' => $password ])) {

            return redirect()->route('profile.edit', Auth::id());

        }

        return redirect()->intended('register');

    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected function redirectTo ()
    {
        return route('home');
    }


}
