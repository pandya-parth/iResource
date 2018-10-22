<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Former\Facades\Former;
use App\User;
use App\Department;
use App\Question;
use App\SiteSetting;
use Validator;
use Carbon\Carbon;
use DB;
use Hash;
use Auth;
use App\Test;
use PDF;

class DashboardController extends Controller
{
	/**
	 * Display view.
	 *
	 * @return view
	 */
	public function index()
	{        
		if (Auth::user()->role == 'admin') {
			$users = User::where("role","=","interviewer")->where("active","=",1)->get();
			$departments = Department::all();
			foreach ($departments as $d) {
				$months= [];
				$month_data = User::where("role","=","interviewer")->where('department_id',$d->id)->select(DB::raw("COUNT(*) as count ,  MONTH(created_at) as month"))
				->groupBy(DB::raw("month(created_at)"))
				->pluck('count','month');
				for($i=1; $i<=12;$i++)
				{
					$months[] =  isset($month_data[$i]) ? $month_data[$i] : 0;
				}
				$data[] = array(
					'name' => $d->name,
					'data' => $months
				);
			}
			$data = json_encode($data);
			return view('admin.index',compact('users','departments','data'));       
		}
	else if(Auth::user()->role == 'employee')
		{
			$users = User::where("role","=","interviewer")->where("active","=",1)->get();
			$questions = Question::all();
			$months= [];
			$month_data = User::where("role","=","interviewer")->where('department_id',Auth::user()->department_id)->where('department_id',Auth::user()->department_id)->select(DB::raw("COUNT(*) as count ,  MONTH(created_at) as month"))
			->groupBy(DB::raw("month(created_at)"))
			->pluck('count','month');
			for($i=1; $i<=12;$i++)
			{
				$months[] =  isset($month_data[$i]) ? $month_data[$i] : 0;
			}
			$data[] = array(
				'name' => Auth::user()->department->name,
				'data' => $months
			);
			$data = json_encode($data);
			return view('admin.index',compact('users','questions','data'));  
		}
		else
		{
			$personal = Auth::user()->last_name != '' ? 40 : 0;
			$experience = count(Auth::user()->experiences) > 0 ? 20 : 0;
			$qualification = count(Auth::user()->qualifications) > 0 ? 20 : 0;
			$reference = count(Auth::user()->references) > 0 ? 20 : 0;
			$profile = $personal + $experience + $qualification + $reference;
			$admin_per = Auth::user()->admin_per;
			$team_lead_per = Auth::user()->team_lead_per;
			$total = Test::where('user_id','=',Auth::user()->id)->count();
			$attempt = Test::where('user_id','=',Auth::user()->id)->where('correct', true)->count();
			$result = $attempt > 0 ? ( $attempt  * 100) / $total : 0;
			$progress = ($result + $profile + $admin_per + $team_lead_per) / 4;
			return view('admin.index',compact('profile','result','progress'));       
		}
	}

	/**
	 * Get site setting.
	 *
	 * @return view
	 */
	public function site_settings()
	{
		$site_setting = SiteSetting::first();
		return view('admin.site_settings', compact('site_setting'));
	}

	/**
	 * Posts site settings.
	 *
	 * @param      \Illuminate\Http\Request  $request  The request
	 *
	 * @return view/message
	 */
	public function post_site_settings(Request $request)
	{
		$rules=[
			'title' => 'required',
			'email' => 'required|email',
			'phone_1' => 'required',
			'phone_2' => 'required',
			'copy_right' => 'required',
			'question_limit' => 'required',
			'time_limit'=>'required'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) { 
			Former::withErrors($validator);
			return redirect()->back()->withErrors($validator)->withInput();
		}
		try
		{
			if(Auth::user()->role == 'admin')
			{
				$site_setting = SiteSetting::first();
				$site_setting->title=$request->get('title');
				$site_setting->email=$request->get('email');
				$site_setting->phone_1=$request->get('phone_1');
				$site_setting->phone_2=$request->get('phone_2');
				$site_setting->copy_right=$request->get('copy_right');
				$site_setting->question_limit=$request->get('question_limit');
				$site_setting->time_limit=$request->get('time_limit');
				$site_setting->save();
				return redirect()->route('site-settings-get')->with('success', "Settings saved successfully.");
			}
			else
			{
				return redirect()->route('site-settings-get')->with('error', 'You dont have rights to change site settings.');
			}
			
		}
		catch(\Exception $e)
		{
			return redirect()->route('site-settings-get')->with('error', 'Something went wrong, Please try after sometime.');
		}
	}

	/**
	 * Display generate.
	 *
	 * @return view
	 */
	public function generate()
	{
		return view('admin.generate');
	}

	/**
	 * Posts a generate.
	 *
	 * @param      \Illuminate\Http\Request  $request  The request
	 *
	 * @return view/message
	 */
	public function post_generate(Request $request)
	{
		$rules=[
			'number' => 'required',
			'department_id' => 'required',
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) { 
			Former::withErrors($validator);
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$users = [];
		$pswds = [];
		for ($i=0; $i < $request->get('number'); $i++) { 
			$length = 10;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $length);
			$user=New User;
			$user->role= 'interviewer';
			$user->name= $randomString;
			$user->email='Test'.$randomString.date('Y').'@gmail.com';
			$user->password= Hash::make($randomString);
			$user->department_id=$request->get('department_id');
			$user->save();	
			array_push($pswds, $randomString);
			array_push($users, $user);
		}
		$pdf = PDF::loadView('admin.pdf', compact('users','pswds'));
		return $pdf->download('Auto_Generated_ID.pdf');	    
	}

}
