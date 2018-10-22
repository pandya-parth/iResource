<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated( \Illuminate\Http\Request $request, \App\User $user ) {
        return redirect('/admin')->with('success', "You have been logged in.");
    }

    public function login(Request $request)
    {
        
         $rules = array(
              'role' => 'required',
              'email' => 'required|email',
              'password' => 'required',
          );
          $messages = array(
              'role.required' => 'Please select your role.',
              'email.required' => 'Please enter your email address.',
              'email' => 'Please enter valid email address.',
              'password.required'=>'Please enter your password.'
            );

          $validator = Validator::make($request->all(), $rules, $messages);
          if ($validator->passes()) {

                if (!Auth::validate(['email' => $request->email, 'password' => $request->password, 'role' => $request->role])) {
                    return redirect()->back()->withInput($request->all())->with('errors','Credentials do not match our records..please try again.');
                }
                $credentials  = array('email' => $request->email, 'password' => $request->password, 'role' => $request->role);
                if (Auth::attempt($credentials, $request->remember)){
                      return redirect()->to('/admin')->with('success','You are successfully logged in.');;
                }

                return redirect('login')
                    ->withInput($request->only('email', 'remember'))
                    ->with('errors','Invalid Credentials');
            }
            else
            {
               return Redirect::back()
                          ->withErrors($validator)
                          ->withInput()
                          ->with('error','Please correct the following errors');
            }
        
    }
    
}
