<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Validator;
use Mail;
use DB;
use Newsletter;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function subscribe(Request $request) {
        $rules = array(
            'email' => 'required|email',
        );
        $messages = array(
            'email.required' => 'Please enter your email address',
            'email' => 'Please enter valid email address',
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {

            try {
                if(!Newsletter::hasMember($request->get('email')))
                {
                  Newsletter::subscribe($request->get('email'));
                  $data = $request->all();

                    Mail::send('emails.subscribe', ['email' => $request->get('email')], function($message) use($request){
                     $message->to(config()->get('settings.email'));
                     $message->subject($request->get('email') . ' subscribed to our website');
                    });
                    Mail::send('emails.subscribe_thanku', ['email' => $request->get('email')], function($message) use($request){
                        $message->from('admin@iresource.com', 'iResource');
                        $message->to($request->get('email'));
                        $message->subject('Thank you for subscribe to our newsletter');
                    });
                    return Response::json("Thank you for subscribe to our newsletters.", 201);
                }
                else
                {
                    return Response::json("You are already subscribed.", 422);
                }
            }
            catch (Exception $e) {
                return Request::ajax() ? Response::json(array('errors'=>$e->getMessage()), 422) : Redirect::back()->withErrors($validator)->withInput()->with('error', $e->getMessage());
              }

            }
            else
            {
                return Response::json("Please enter email", 422);
            }  
        } 

        public function contact(Request $request) {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        );
        $messages = array(
            'namme.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'email' => 'Please enter valid email address',
            'phone.required' => 'Please enter your phone',
            'phone.numeric' => 'Please enter only digits',

        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {

            try {
                   $data = $request->all();
                    Mail::send('emails.contact', ['data'=>$data], function($message) use($request){
                     $message->to(config()->get('settings.email'));
                     $message->subject($request->get('email') . ' request for a demo.');
                    });
                    Mail::send('emails.contact_thanku', ['name' => $request->get('name')], function($message) use($request){
                        $message->from('admin@iresource.com', 'iResource');
                        $message->to($request->get('email'));
                        $message->subject('Thank you for request, We will contact you soon.');
                    });
                    return Response::json("Thank you for request We will contact you soon.", 201);
            }
            catch (Exception $e) {
                return Request::ajax() ? Response::json(array('errors'=>$e->getMessage()), 422) : Redirect::back()->withErrors($validator)->withInput()->with('error', $e->getMessage());
              }

            }
            else
            {
                return Response::json("Please enter email", 422);
            }  
        } 
}
