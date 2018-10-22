<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use Validator;
use Former;
use Mail;
use Auth;

class QuestionsController extends Controller
{

  /**
   * Display view.
   *
   * @return  view
   */
  public function index()
  {
    if ( Auth::user()->role == 'admin' ) {
      $questions = Question::orderBy('id')->get();
    }
    else
    {
      $questions = Question::where('department_id',Auth::user()->department_id)->orderBy('id')->get();
    }
    return view('admin.questions.index',compact('questions'));
  }

  /**
   * Add questions.
   *
   * @return view
   */
  public function create()
  {
    return view('admin.questions.add');
  }

  /**
   * Save data.
   *
   * @param      \Illuminate\Http\Request  $request  The request
   *
   * @return     view/data/message
   */
  public function store( Request $request )
  {
    $rules=[
    'question' => 'required',
    'a' => 'required',
    'b' => 'required',
    'c' => 'required',
    'd' => 'required',
    'answer' => 'required',
    ];
    $validator = Validator::make( $request->all(),$rules );
    if ( $validator->fails() ) { 
      // validation fail then redirect back
      Former::withErrors( $validator );
      return redirect()->back()->withErrors( $validator )->withInput();
    }
    //if validation success then save data to the database using below code 
    try
    {
      // create  new question
      $question = New Question;
      $question->department_id=$request->get('department_id');
      $question->question=$request->get('question');
      $question->a=$request->get('a');
      $question->b=$request->get('b');
      $question->c=$request->get('c');
      $question->d=$request->get('d');
      $question->answer=$request->get('answer');
      $question->more_info=$request->get('more_info');
      $question->save();
      return redirect()->route('questions.index')->withSuccess("Qustion has been added  successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('questions.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  /**
   * Edit questions
   *
   * @param      int  $id     The identifier
   *
   * @return     view/data
   */
  public function edit( $id )
  { 
    $question = Question::find( $id );
    Former::populate( $question );
    return view('admin.questions.edit',compact('question'));

  }

  /**
   * Update questions
   *
   * @param      \Illuminate\Http\Request  $request  The request
   * @param      int                    $id       The identifier
   *
   * @return     save/data/message
   */
  public function update( Request $request, $id )
  { 

    $rules=[
      'question' => 'required',
      'a' => 'required',
      'b' => 'required',
      'c' => 'required',
      'd' => 'required',
      'answer' => 'required',
    ];
    $validator = Validator::make( $request->all(), $rules );
    if ( $validator->fails() ) {
      Former::withErrors( $validator );
      return redirect()->back()->withErrors( $validator )->withInput();
    }
    try
    {
      $question = Question::find( $id );
      $question->update( $request->all() );
      return redirect()->route('questions.index')->withSuccess('Question has been updated successfully.');
    }
    catch(\Exception $e)
    {
      return redirect()->route('questions.index')->withError('Something went wrong, Please try after sometime.');
    }       
  }

  /**
   * Show all questions
   *
   * @param      int  $id     The identifier
   *
   * @return     view/data
   */
  public function show( $id )
  {
    $question = Question::find( $id );
    return view('admin.questions.show',compact('question'));

  }

  /**
   * Delete questions.
   *
   * @param      int  $id     The identifier
   *
   * @return     view/data/message
   */
  public function destroy( $id )
  {
    try
    {
      $question = Question::find( $id );
      $question->delete();
      return redirect()->route('questions.index')->withSuccess('Question has been deleted successfully.');
    }
    catch(\Exception $e)
    {
      return redirect()->route('questions.index')->withError('Something went wrong, Please try after sometime.');
    }
  }
}
