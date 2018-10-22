<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserExperience;
use Validator;
use Former;
use Mail;
use Hash;
use Carbon\Carbon;
use Auth;
use App\Question;

class UserExperiencesController extends Controller
{
  /**
   * Display view
   *
   * @return   view
   */
  public function index()
  {
    $user_experiences = UserExperience::where('user_id','=',Auth::user()->id)->get();
    return view('admin.user_experiences.index',compact('user_experiences'));
  }

  /**
   * Add user experiences.
   *
   * @return   view
   */
  public function create()
  {
    return view('admin.user_experiences.add');
  }

  /**
   * Save data
   *
   * @param      \Illuminate\Http\Request  $request  The request
   *
   * @return     view/data/message
   */
  public function store(Request $request)
  {
    $rules=[
      'organisation_name' => 'required',
      'designation' => 'required',
      'duration_in_years' => 'required|numeric',
      'ctc' => 'required|numeric',
      'reason_for_leaving' => 'required',

    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $user_experience=New UserExperience;
    $user_experience->user_id = Auth::user()->id;
    $user_experience->organisation_name=$request->get('organisation_name');
    $user_experience->designation= $request->get('designation');
    $user_experience->duration_in_years=$request->get('duration_in_years');
    $user_experience->ctc= $request->get('ctc');
    $user_experience->reason_for_leaving=$request->get('reason_for_leaving');
    $user_experience->save();
    return redirect()->route('user.experiences.index', Auth::user()->id)->withSuccess('Details saved successfully');      

  }
  public function edit($user_id, $id)
  { 
    $experience = UserExperience::find($id);
    return view('admin.user_experiences.edit',compact('experience'));
  }
  public function update(Request $request, $user_id, $id)
  { 
    $rules=[
      'organisation_name' => 'required',
      'designation' => 'required',
      'duration_in_years' => 'required|numeric',
      'ctc' => 'required|numeric',
      'reason_for_leaving' => 'required',

    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try{    
      $user_experience=UserExperience::find($id);
      $user_experience->update($request->all());
      return redirect()->route('user.experiences.index', Auth::user()->id)->withSuccess('Details updated successfully');      
    }
    catch(\Exception $e)
    {
      return redirect()->route('user.experiences.index', Auth::user()->id)->withError('Something went wrong, Please try after sometime.');
    }

  }
  public function show(Request $request, $user_id, $id)
  {
    $experience = UserExperience::find($id);
    return view('admin.user_experiences.show',compact('experience'));
  }
  public function destroy($user_id, $id)
  {
    try
    {
      $user_experience = UserExperience::find($id);
      $user_experience->delete();
      return redirect()->route('user.experiences.index', Auth::user()->id)->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('user.experiences.index', Auth::user()->id)->withError('Something went wrong, Please try after sometime.');
    }
  }
}
