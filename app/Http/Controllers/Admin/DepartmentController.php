<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;
use Former;
use Mail;
use Hash;
class DepartmentController extends Controller
{

/**
 * Display View.
 *
 * @return view
 */
public function index()
{
	$departments = Department::all();
	return view('admin.departments.index',compact('departments'));
}

/**
 * Add departments.
 *
 * @return view
 */
public function create()
{
	return view('admin.departments.add');
}

/**
 * Save Data.
 *
 * @param      \Illuminate\Http\Request  $request  The request
 *
 * @return view/message
 */
public function store(Request $request)
{
	$rules=[
	'name' => 'required',
	];
	$messages=[
	'name.required' => 'The name field is required',
	];
	$validator = Validator::make($request->all(),$rules,$messages);
	if ($validator->fails()) { 
		Former::withErrors($validator);
		return redirect()->back()->withErrors($validator)->withInput();
	}
	try
	{
		$department=New Department;
		$department->name=$request->get('name');
		$department->save();
		return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
	}
	catch(\Exception $e)
	{
		return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
	}
}

/**
 * Edit departments
 *
 * @param      int  $id     The identifier
 *
 * @return view/data
 */
public function edit($id)
{ 
	$department = Department::find($id);
	return view('admin.departments.edit',compact('department'));
}

/**
 * Update departments.
 *
 * @param      \Illuminate\Http\Request  $request  The request
 * @param      int                    $id       The identifier
 *
 * @return view/message
 */
public function update(Request $request, $id)
{ 
	$rules=[
	'name' => 'required',
	];
	$messages=[
	'name.required' => 'The name field is required',
	];
	$validator = Validator::make($request->all(),$rules,$messages);
	if ($validator->fails()) {
		Former::withErrors($validator);
		return redirect()->back()->withErrors($validator)->withInput();
	}
	
	$department=Department::find($id);
	$department->update($request->all());
	return redirect()->route('departments.index')->withSuccess('Record updated successfully');
	
}

/**
 * Departments show
 *
 * @param    int   $id     The identifier
 *
 * @return  view/data
 */
public function show($id)
{
	$department = Department::find($id);
	return view('admin.departments.show',compact('department'));
}

/**
 * Delete departments
 *
 * @param      int  $id     The identifier
 *
 * @return     view/message
 */
public function destroy($id)
{
	try
	{
		$department = Department::find($id);
		$department->delete();
		return redirect()->route('departments.index')->withSuccess('Deleted successfully');
	}
	catch(\Exception $e)
	{
		return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
	}
}

/**
 * Change status.
 *
 * @param      int  $id     The identifier
 *
 * @return     view/message.
 */
public function SwitchStatus($id)
{
	try
	{
		$department = Department::find($id);
		$department->publish = $department->publish == "1" ? "0" : "1";
		$department->save();
		return redirect()->route('departments.index')->withSuccess('Status updated successfully');
	}
	catch(\Exception $e)
	{
		return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
	}
}
}
