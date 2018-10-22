<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Former;
use Mail;
use Hash;
use Carbon\Carbon;
use Auth;
use App\Question;

class EmployeesController extends Controller
{

	/**
	 * Display show.
	 *
	 * @return view.
	 */
	public function index()
	{
		$employees = User::where('role','=','employee')->orderBy('name')->get();
		return view('admin.employees.index',compact('employees'));
	}

	/**
	 * Add employees
	 *
	 * @return view
	 */
	public function create()
	{
		return view( 'admin.employees.add' );
	}

	/**
	 * Save data.
	 *
	 * @param      \Illuminate\Http\Request  $request  The request
	 *
	 * @return  view/message
	 */
	public function store( Request $request )
	{
		$rules=[
		'name' => 'required|max:30',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed',
		'password_confirmation' => 'required',
		'department_id' => 'required',

		];
		$validator = Validator::make( $request->all(),$rules );
		if ( $validator->fails() ) { 
			Former::withErrors( $validator );
			return redirect()->back()->withErrors( $validator )->withInput();
		}
		try
		{
			if( ! User::where('role','=','employee')->where('department_id','=',$request->get('department_id'))->count() > 0 )
				{
					$user = New User;
					$user->name=$request->get('name');
					$user->role= 'employee';
					$user->email=$request->get('email');
					$user->password= Hash::make($request->get('password'));
					$user->department_id=$request->get('department_id');
					$user->save();
					return redirect()->route('employees.index')->withSuccess("Employee created successfully.");
				}
				else
				{
					return redirect()->back()->withError('This department has already one teamlead.');
				}
			}
			catch(\Exception $e)
			{
				return redirect()->route('employees.index')->withError('Something went wrong, Please try after sometime.');
			}

		}

		/**
		 * Edit employees
		 *
		 * @param      int  $id     The identifier
		 *
		 * @return     view/data
		 */
		public function edit( $id )
		{ 
			$user = User::find( $id );
			return view('admin.employees.edit',compact('user'));
		}

		/**
		 * Update employees.
		 *
		 * @param      \Illuminate\Http\Request  $request  The request
		 * @param      int                    $id       The identifier
		 *
		 * @return     view/message
		 */
		public function update( Request $request, $id )
		{ 
			$rules=[
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' .$id
			];
			$validator = Validator::make( $request->all(),$rules );
			if ( $validator->fails() ) {
				Former::withErrors( $validator );
				return redirect()->back()->withErrors( $validator )->withInput();
			}
			try{   
				if( ! User::where('role','=','employee')->where('department_id','=',$request->get('department_id'))->where('id','!=',$id)->count() > 0 )
				{ 
				$user = User::find( $id );
				$user->update( $request->all() );
				return redirect()->route('employees.index')->withSuccess('Employee details updated successfully');
				}
				else
				{
					return redirect()->back()->withError('This department has already one teamlead.');
				}
			}
			catch(\Exception $e)
			{
				return redirect()->route('employees.index')->withError('Something went wrong, Please try after sometime.');
			}

		}

		/**
		 * Show employees
		 *
		 * @param      \Illuminate\Http\Request  $request  The request
		 * @param      int                    $id       The identifier
		 *
		 * @return     view/message
		 */
		public function show( Request $request, $id )
		{
			$user = User::find ($id );
			$from_where = $request->get('from_where');
			return view('admin.employees.show',compact('user','from_where'));
		}
		/**
		 * Delete employees.
		 *
		 * @param      int  $id     The identifier
		 *
		 * @return     view/data
		 */
		public function destroy( $id )
		{
			try
			{
				$user = User::find( $id );
				$user->delete();
				return redirect()->route('employees.index')->withSuccess('Employee deleted successfully');
			}
			catch(\Exception $e)
			{
				return redirect()->route('employees.index')->withError('Something went wrong, Please try after sometime.');
			}
		}

		/**
		 * Change status
		 *
		 * @param      int  $id     The identifier
		 *
		 * @return 		 view/data
		 */
		public function SwitchStatus( $id )
		{
			$user = User::find( $id );
			$user->active = $user->active == "1" ? "0" : "1";
			$user->save();
			return redirect()->route('employees.index')->withSuccess('Status updated successfully');   
		}

		/**
		 * Gets the account.
		 *
		 * @return     view  The account.
		 */
		public function getAccount()
		{
			$user = User::find( Auth::user()->id );
			Former::populate( $user );
			return view('doctor_portal.employees.change_profile',compact('user'));
		}

		/**
		 * Posts an account.
		 *
		 * @param      \Illuminate\Http\Request  $request  The request
		 *
		 * @return     view/message
		 */
		public function postAccount( Request $request )
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

			$validator = Validator::make( $request->all() ,$rules, $messages );
			if ( $validator->fails() ) {
				return redirect()->back()->withErrors($validator)->withInput()->with('error','Please correct following errors');
			}
			$user = User::find( Auth::user()->id );
			$user->update( $request->all() );
			return redirect()->to('portal/settings')->with('success','Employee profile updated successfully');
		}

		/**
		 * Gets the change password.
		 *
		 * @return     view  The change password.
		 */
		public function getChangePassword()
		{ 
			return view('doctor_portal.employees.change_password');
		}

		/**
		 * Posts a change password.
		 *
		 * @param      \Illuminate\Http\Request  $request  The request
		 *
		 * @return     view/data/message
		 */
		public function postChangePassword( Request $request )
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

			$validation = Validator::make( $request->all(), $rules,$messages );
			if ( $validation->fails() )
			{
				return Redirect::back()->withErrors( $validation );
			}
			else
			{
				if( Hash::check( $request->get('old_password'),Auth::user()->password ) )
					{
						$user = User::find( Auth::id() );
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

			/**
			 * Test view
			 *
			 * @param      init  $id     The identifier
			 *
			 * @return view/data
			 */
			public function test( $id )
			{
				$questions = Question::all();
				return view('admin.test', compact('questions'));
			}

		}
