<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Test;
use App\Question;
use Validator;
use Former;
use Mail;
use Hash;
use Carbon\Carbon;
use Auth;
use PDF;

class UsersController extends Controller
{
  public function index()
  {
    if(Auth::user()->role == "admin")
    {
      $users = User::where('role','=','interviewer')->orderBy('updated_at')->get();
    }
    else
    {
      $users = User::where('role','=','interviewer')->where('department_id',Auth::user()->department_id)->orderBy('updated_at')->get();
    }
    return view('admin.interviewers.index',compact('users'));
  }
  public function create()
  {
    return view('admin.interviewers.add');
  }
  public function store(Request $request)
  {
    $rules=[
      'name' => 'required|max:30',
      'email' => 'required|email|unique:users',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required',
      'department_id' => 'required',

    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $user=New User;
    $user->name=$request->get('name');
    $user->role= 'interviewer';
    $user->email=$request->get('email');
    $user->password= Hash::make($request->get('password'));
    $user->department_id=$request->get('department_id');
    $user->save();
    return redirect()->route('users.index')->withSuccess("Interviewer created successfully.");

  }
  public function edit($id)
  { 
    $user = User::find($id);
    return view('admin.interviewers.edit',compact('user'));
  }
  public function update(Request $request, $id)
  { 
    if (Auth::user()->role != 'interviewer') {
      $rules=[
      'name' => 'required',
      'email' => 'required',
      'admin_review' => 'required',
      'admin_per' => 'required|numeric',
      'team_lead_review' => 'required',
      'team_lead_per' => 'required|numeric',
    ];
    }
    else
    {
    $rules=[
      'name' => 'required',
      'last_name' => 'required',
      'gender' => 'required',
      'dob' => 'required',
      'city' => 'required',
      'state' => 'required',
      'country' => 'required',
      // 'phone' => 'required|numeric',
      'pincode' => 'required|numeric',
      'mobile' => 'required|numeric',
      'post_applied' => 'required',
      // 'notice_period' => 'required',
      'nationality' => 'required',
      'blood_group' => 'required',
      // 'expected_ctc' => 'required|numeric',
      // 'current_ctc' => 'required|numeric',
      'res_address' => 'required',
      'per_address' => 'required',
      'marital_status' => 'required',
    ];
  }
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try{    
      $user=User::find($id);
      $user->age = date('Y') - date('Y', strtotime($request->get('dob')));
      $user->update($request->all());
      if (Auth::user()->role != 'interviewer') {
          if($request->get('active') == 'true')
          {
            $status = $request->get('active') == 'true' ? 'approved' : 'deactivated';
            Mail::send('emails.switch_status', ['data' => $user], function($message) use($request, $status) {
              $message->to($request->get('email'));
              $message->subject('Your account has been '.$status);
            });
          }
          return redirect()->route('users.index')->withSuccess('Interviewer details updated successfully');
      }
      else
      {
        return redirect()->route('admin-dashboard')->withSuccess('Interviewer details updated successfully');
      }
      
    }
    catch(\Exception $e)
    {
      return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
    }

  }
  public function show(Request $request, $id)
  {
    $user = User::find($id);
    $from_where = $request->get('from_where');
    return view('admin.interviewers.show',compact('user','from_where'));
  }
  public function destroy($id)
  {
    try
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('users.index')->withSuccess('Interviewer deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
  public function SwitchStatus($id)
  {
    $user = User::find($id);
    $user->active = $user->active == "1" ? "0" : "1";
    $user->save();
    if($user->active == 1)
    {
      $status = $user->active ? 'approved' : 'deactivated';
      Mail::send('emails.switch_status', ['data' => $user, 'status' => $status], function($message) use($user, $status) {
        $message->to($user->email);
        $message->subject('Your are '.$status.' by iResource Management');
      });
      Mail::send('emails.admin_switch_status', ['data' => $user, 'status' => $status], function($message) use($user, $status) {
        $message->to(config()->get('settings.email'));
        $message->subject(title_case($user->name) . ' has been selected in '. title_case($user->department->name));
      });
      $team_lead = User::where('role','=','employee')->where('department_id','=',$user->department_id)->first();
      if($team_lead)
      {
        Mail::send('emails.teamlead_switch_status', ['data' => $user, 'status' => $status, 'team_lead' => $team_lead], function($message) use($user, $team_lead, $status) {
          $message->to($team_lead->email);
          $message->subject(title_case($user->name) . ' has been selected in your team.');
        });
      }      
    }
    return redirect()->route('users.index')->withSuccess('Status updated successfully');   
  }

  public function getAccount()
  {
    $user = User::find(Auth::user()->id);
    Former::populate($user);
    return view('doctor_portal.users.change_profile',compact('user'));
  }

  public function postAccount(Request $request)
  {

    $rules=[
      'name' => 'required',
      'last_name' => 'required|sometimes',
      'dob' => 'required|sometimes',
      'gender' => 'required|sometimes',
      'address' => 'required|sometimes',
      'height' => 'required|sometimes',
      'weight' => 'required|sometimes',
    ];       

    $messages=[
      'name.required' => 'Please enter your first name.',
      'last_name.required' => 'Please enter your last name.',
      'dob.required' => 'Please select your date of birth.',
      'gender.required' => 'Please select your gender.',
      'address.required' => 'Please enter your address.',
      'height.required' => 'Please enter your height.',
      'weight.required' => 'Please enter your weight.',
    ];

    $validator = Validator::make($request->all(),$rules ,$messages);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput()->with('error','Please correct following errors');
    }
    $user = User::find(Auth::user()->id);
    $user->update($request->all());
    return redirect()->to('portal/settings')->with('success','Interviewer profile updated successfully');
  }

  public function getChangePassword()
  { 
    return view('doctor_portal.users.change_password');
  }

  public function postChangePassword(Request $request)
  {
    $rules =[
      'old_password'  => 'required',
      'password'  => 'required|min:6|max:20|confirmed|different:old_password',
      'password_confirmation' =>  'required'
    ];

    $messages=[
      'old_password.required' => 'Please enter current password.',
      'password.required' => 'Please enter new password.',
      'password.min:6' => 'Please enter minimum 6 character.',
      'password.max:20' => 'Please enter maximum 20 character.',
      'password.confirmed' => 'Password and Confirmation Password are not same.',
      'password.different' => 'Old Password and New Password are same.',
      'password_confirmation.required' => 'Please enter new password again.',
    ];

    $validation = Validator::make($request->all(), $rules,$messages);
    if ($validation->fails())
    {
      return Redirect::back()->withErrors($validation);
    }
    else
    {
      if(Hash::check($request->get('old_password'),Auth::user()->password))
      {
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return Redirect::back()->with('success','Your password changed successfully');
      }
      else
      {
        return Redirect::back()->with('error','Please enter correct current password');
      }
    }
  }

  public function test()
  {
    $questions = Question::where('department_id',Auth::user()->department_id)->inRandomOrder()->limit(config()->get('settings.question_limit'))->get();
    return view('admin.user_test.test', compact('questions'));
  }

  public function profile(Request $request, $id)
  {
    $user = User::find( $id );
    $pdf = PDF::loadView('admin.interviewers.profile', compact('user'));
    return $pdf->download('User_Profile_Of_' . title_case($user->name) . '.pdf');     
  }

  public function submit( Request $request ) {

    foreach ( $request->get( 'questions' ) as $key => $question ) {
        $question = Question::find($question);
        $correct = false;
        if(isset($request->get('answer')[$key]) && $request->get('answer')[$key] == $question->answer)
        {
          $correct = true;
        }
        $test = new Test;
        $test->user_id = Auth::user()->id;
        $test->department_id = Auth::user()->department_id;
        $test->question_id = $question->id;
        $test->answer = isset($request->get('answer')[$key]) ? $request->get('answer')[$key] : "";
        $test->correct = $correct;
        $test->save();
    }
    return redirect()->route('thankyou')->with('success',' Thank you.');;
  }

  public function thankyou()
  {
    return view('thankyou');
  }

}
