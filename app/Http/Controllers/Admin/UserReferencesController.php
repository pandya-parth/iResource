<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserReference;
use Validator;
use Former;
use Mail;
use Hash;
use Carbon\Carbon;
use Auth;
use App\Question;

class UserReferencesController extends Controller
{
  public function index()
  {
    $user_references = UserReference::where('user_id','=',Auth::user()->id)->get();
    return view('admin.user_references.index',compact('user_references'));
  }
  public function create()
  {
    return view('admin.user_references.add');
  }
  public function store(Request $request)
  {
    $rules=[
      'name' => 'required',
      'designation' => 'required',
      'organisation' => 'required',
      'email' => 'required',
      'contact' => 'required',

    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $user_reference=New UserReference;
    $user_reference->user_id = Auth::user()->id;
    $user_reference->name=$request->get('name');
    $user_reference->designation= $request->get('designation');
    $user_reference->organisation=$request->get('organisation');
    $user_reference->email= $request->get('email');
    $user_reference->contact=$request->get('contact');
    $user_reference->save();
    return redirect()->route('user.references.index', Auth::user()->id)->withSuccess('Details saved successfully');      

  }
  public function edit($user_id, $id)
  { 
    $reference = UserReference::find($id);
    return view('admin.user_references.edit',compact('reference'));
  }
  public function update(Request $request, $user_id, $id)
  { 
    $rules=[
      'name' => 'required',
      'designation' => 'required',
      'organisation' => 'required',
      'email' => 'required',
      'contact' => 'required',

    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    try{    
      $user_reference=UserReference::find($id);
      $user_reference->update($request->all());
      return redirect()->route('user.references.index', Auth::user()->id)->withSuccess('Details updated successfully');      
    }
    catch(\Exception $e)
    {
      return redirect()->route('user.references.index', Auth::user()->id)->withError('Something went wrong, Please try after sometime.');
    }

  }
  public function show(Request $request, $user_id, $id)
  {
    $reference = UserReference::find($id);
    return view('admin.user_references.show',compact('reference'));
  }
  public function destroy($user_id, $id)
  {
    try
    {
      $user_reference = UserReference::find($id);
      $user_reference->delete();
      return redirect()->route('user.references.index', Auth::user()->id)->withSuccess('Deleted successfully');
    }
    catch(\Exception $e)
    {
      return redirect()->route('user.references.index', Auth::user()->id)->withError('Something went wrong, Please try after sometime.');
    }
  }
}
