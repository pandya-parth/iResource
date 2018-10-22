<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserQualification;
use Validator;
use Former;
use Mail;
use Hash;
use Carbon\Carbon;
use Auth;

class UserQualificationsController extends Controller
{
	/**
	 * Diplay qualifications.
	 *
	 * @return view
	 */
	public function index()
	{
		$qualifications = UserQualification::where('user_id','=',Auth::user()->id)->get();
		return view( 'admin.user_qualifications.index', compact('qualifications') );
	}

	/**
	 * Edit qualifications
	 *
	 * @return edit view.
	 */
	public function create()
	{
		return view( 'admin.user_qualifications.add' );
	}

	/**
	 * Save qualifications
	 *
	 * @param      \Illuminate\Http\Request  $request  The request
	 *
	 * @return    view / error
	 */
	public function store( Request $request )
	{
		$rules=[
		'degree' => 'required|max:60',
		'university' => 'required:max:60',
		'specialisation' => 'required',
		'achievements' => 'required',
		'passing_year' => 'required|numeric',
		'percentage' => 'required|numeric',
		];

		$validator = Validator::make( $request->all(), $rules );

		if ( $validator->fails() ) {
			Former::withErrors( $validator );
			return redirect()->back()->withErrors( $validator )->withInput();
		}

		$user_qualifications = New UserQualification;
		$user_qualifications->user_id = Auth::user()->id;
		$user_qualifications->degree = $request->get('degree');
		$user_qualifications->university = $request->get('university');
		$user_qualifications->specialisation = $request->get('specialisation');
		$user_qualifications->achievements = $request->get('achievements');
		$user_qualifications->passing_year = $request->get('passing_year');
		$user_qualifications->percentage = $request->get('percentage');
		$user_qualifications->save();

		return redirect()->route('user.qualifications.index', Auth::user()->id)->withSuccess('Details updated successfully');      
	}

	/**
	 * Edit qualifications
	 *
	 * @param      int  $id     The identifier
	 *
	 * @return view
	 */
	public function edit($user_id, $id)
	{ 
		$qualification = UserQualification::find( $id );
		return view('admin.user_qualifications.edit',compact('qualification'));
	}

	/**
	 * Update qualifications
	 *
	 * @param      \Illuminate\Http\Request  $request  The request
	 * @param      int                    $id       The identifier
	 *
	 * @return     view/error
	 */
	public function update(Request $request, $user_id, $id)
	{ 
		$rules=[
		'degree' => 'required|max:60',
		'university' => 'required:max:60',
		'specialisation' => 'required',
		'achievements' => 'required',
		'passing_year' => 'required|numeric',
		'percentage' => 'required|numeric',
		];

		$validator = Validator::make( $request->all(), $rules );

		if ( $validator->fails() ) {
			Former::withErrors( $validator );
			return redirect()->back()->withErrors( $validator )->withInput();
		}
		try {  

			$user_qualification=UserQualification::find( $id );

			$user_qualification->update( $request->all() );

			return redirect()->route('user.qualifications.index', Auth::user()->id)->withSuccess('Details updated successfully');

		}
		catch( \Exception $e )
		{
			return redirect()->route('user.qualifications.index', Auth::user()->id)->withError('Something went wrong, Please try after sometime.');
		}
	}

	/**
	 * Show qualification
	 *
	 * @param      \Illuminate\Http\Request  $request  The request
	 * @param      int                    $id       The identifier
	 *
	 * @return  view with data.
	 */
	public function show(Request $request, $user_id, $id)
	{
		$qualification = UserQualification::find( $id );
		return view('admin.user_qualifications.show',compact('qualification'));
	}

	/**
	 * Delete qualification
	 *
	 * @param      int  $id     The identifier
	 *
	 * @return  view/message
	 */
	public function destroy($user_id, $id)
	{
		try
		{
			$qualification = UserQualification::find( $id );
			$qualification->delete();
			return redirect()->route('user.qualifications.index', Auth::user()->id)->withSuccess('Deleted successfully');
		}
		catch(\Exception $e)
		{
			return redirect()->route('user.qualifications.index', Auth::user()->id)->withError('Something went wrong, Please try after sometime.');
		}
	}

}

