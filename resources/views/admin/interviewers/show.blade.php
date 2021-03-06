@extends('admin.layouts.panel')
@section('title','Interviewer Detail')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Interviewer Detail</h4>
			</div>	
			<div class="pull-right">
				<a href="{!! route('users.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr><th scope="col">ID</th>	<td>{!! $user->id !!}</td></tr>
					<tr><th scope="col">Status</th>	<td>{!! $user->active ? 'Selected' : 'Not Selected' !!}</td></tr>
					<tr><th scope="col">Name</th>	<td>{!! $user->name !!}</td></tr>
					<tr><th scope="col">Last Name</th>	<td>{!! $user->last_name !!} </td></tr>
					<tr><th scope="col">Email</th>	<td>{!! $user->email !!}</td></tr>
					<tr><th scope="col">Gender</th>	<td>{!! $user->gender !!} </td></tr>
					<tr><th scope="col">Age</th>	<td>{!! $user->age !!} </td></tr>
					<tr><th scope="col">Date Of Birth</th>	<td>{!! $user->dob !!} </td></tr>
					<tr><th scope="col">Residential Address</th>	<td>{!! $user->res_address !!} </td></tr>
					<tr><th scope="col">Permanent Address</th>	<td>{!! $user->per_address !!} </td></tr>
					<tr><th scope="col">City</th>	<td>{!! $user->city !!} </td></tr>
					<tr><th scope="col">State</th>	<td>{!! $user->state !!} </td></tr>
					<tr><th scope="col">Country</th>	<td>{!! $user->country !!} </td></tr>
					<tr><th scope="col">Phone</th>	<td>{!! $user->pincode !!} - {!! $user->phone !!} </td></tr>
					<tr><th scope="col">Mobile</th>	<td>{!! $user->mobile !!} </td></tr>
					<tr><th scope="col">File</th>	<td><a href="{!! $user->file_url() !!}">{!! $user->file !!}</a></td></tr>
					<tr><th scope="col">Post Applied</th>	<td>{!! $user->post_applied !!} </td></tr>
					<tr><th scope="col">Reference</th>	<td>{!! $user->reference !!} </td></tr>
					<tr><th scope="col">Notice Period</th>	<td>{!! $user->notice_period !!} </td></tr>
					<tr><th scope="col">Nationality</th>	<td>{!! $user->nationality !!} </td></tr>
					<tr><th scope="col">Blood Group</th>	<td>{!! $user->blood_group !!} </td></tr>
					<tr><th scope="col">Expected CTC</th>	<td>{!! $user->expected_ctc !!} </td></tr>
					<tr><th scope="col">Current CTC</th>	<td>{!! $user->current_ctc !!} </td></tr>            
					<tr><th scope="col">Marital Status</th>	<td>{!! $user->marital_status !!} </td></tr>
				</tbody>
			</table>
			<h3 style="page-break-inside: auto; text-decoration: underline; padding-bottom: 10px; padding-top: 10px;">Test Result - {!! App\Test::where('user_id','=',$user->id)->where('correct', true)->count(); !!} / {!! App\Test::where('user_id','=',$user->id)->count(); !!}</h3>
		<table class="table" cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th style="padding: 10px;">#</th>
					<th style="padding: 10px;">Question</th>
					<th style="padding: 10px;">Given Answer</th>
					<th style="padding: 10px;">Right Answer </th>
					<th style="padding: 10px;">True / False</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user->tests as $key => $test)
					<tr>
						@php
						$answer = $test->answer;
						$correct_answer = $test->question->answer
						@endphp
						<td style="padding: 10px;">{!! $key + 1 !!}</td>
						<td style="padding: 10px;">{!! $test->question->question !!}</td>
						<td style="padding: 10px;">{!! $test->question->$answer !!}</td>
						<td style="padding: 10px;">{!! $test->question->$correct_answer !!} </td>
						<td style="padding: 10px;">{!! $test->correct ? 'True' : 'False' !!}</td>
					</tr>
				@endforeach						 
			</tbody>
		</table>
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection