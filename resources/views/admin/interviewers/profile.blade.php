<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title>iResource</title>
<style type="text/css">

@page {
	margin: 2cm;
}

body {
  font-family: sans-serif;
	margin: 2cm 0;
	text-align: justify;
}
.table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        padding-top: 10px;
    }
    th{
      text-align: left;
    }
    td{
      text-align: left;
      border: 1px solid #000000;
    }

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
	color: #aaa;
	font-size: 0.9em;
}

#header {
  top: 0;
	border-bottom: 0.1pt solid #aaa;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border: 0;
}
#header td{
  padding: 0;
	width: 100%;
  border: 0;
}
#footer td{
  width: 50%;
  border: 0;
}
.page-number {
  text-align: center;
}

.page-number:before {
  content: "Page " counter(page);
  color: #333737;
}
hr {
  page-break-after: always;
  border: 0;
}

</style>

</head>

<body>

<div id="header">
  <table>
    <tr>
      <td style="text-align: center;"><img src="{!! public_path().'/images/iresource.png' !!}"></td>
    </tr>
  </table>
</div>

<div id="footer">
  <table>
    <tr>
      <td style="text-align: left;"><img src="{!! public_path().'/images/logo-krishaweb.png' !!}"></td>
      <td><div class="page-number"></div></td>
    </tr>
  </table>
</div>
<div style="padding-left: 10px; padding-right: 22px;">
    <h2 style="text-align: center; padding-bottom: 10px;">Profile Detail Of {!! title_case($user->name) !!} ( {!! title_case($user->department->name) !!} )</h2>
		<h3 style="text-decoration: underline; padding-bottom: 5px;">Personal Details</h3>
		<table class="table" cellpadding="0" cellspacing="0" border="1">
			<tbody>
				<tr><th style="padding: 9px;">Name</th><td style="padding: 9px;">{!! $user->name !!} {!! $user->last_name !!}</td></tr>
				<tr><th style="padding: 9px;">Email</th><td style="padding: 9px;">{!! $user->email !!}</td></tr>
				<tr><th style="padding: 9px;">Status</th>	<td style="padding: 9px;">{!! $user->active ? 'Selected' : 'Not Selected' !!}</td></tr>
				<tr><th style="padding: 9px;">Gender</th>	<td style="padding: 9px;">{!! $user->gender !!} </td></tr>
				<tr><th style="padding: 9px;">Age</th>	<td style="padding: 9px;">{!! $user->age !!} </td></tr>
				<tr><th style="padding: 9px;">Date Of Birth</th>	<td style="padding: 9px;">{!! date('d/m/Y', strtotime($user->dob)) !!} </td></tr>
				<tr><th style="padding: 9px;">Residential Address</th>	<td style="padding: 9px;">{!! $user->res_address !!} </td></tr>
				<tr><th style="padding: 9px;">Permanent Address</th>	<td style="padding: 9px;">{!! $user->per_address !!} </td></tr>
				<tr><th style="padding: 9px;">City</th>	<td style="padding: 9px;">{!! $user->city !!} </td></tr>
				<tr><th style="padding: 9px;">State</th>	<td style="padding: 9px;">{!! $user->state !!} </td></tr>
				<tr><th style="padding: 9px;">Country</th>	<td style="padding: 9px;">{!! $user->country !!} </td></tr>
				<tr><th style="padding: 9px;">Phone</th>	<td style="padding: 9px;">{!! $user->phone !!} </td></tr>
				<tr><th style="padding: 9px;">Mobile</th>	<td style="padding: 9px;">{!! $user->mobile !!} </td></tr>
				<tr><th style="padding: 9px;">Post Applied</th>	<td style="padding: 9px;">{!! $user->post_applied !!} </td></tr>
				<tr><th style="padding: 9px;">Reference</th>	<td style="padding: 9px;">{!! $user->reference !!} </td></tr>
				<tr><th style="padding: 9px;">Notice Period</th>	<td style="padding: 9px;">{!! $user->notice_period !!} </td></tr>
				<tr><th style="padding: 9px;">Nationality</th>	<td style="padding: 9px;">{!! $user->nationality !!} </td></tr>
				<tr><th style="padding: 9px;">Blood Group</th>	<td style="padding: 9px;">{!! $user->blood_group !!} </td></tr>
				<tr><th style="padding: 9px;">Expected CTC</th>	<td style="padding: 9px;">{!! $user->expected_ctc !!} </td></tr>
				<tr><th style="padding: 9px;">Current CTC</th>	<td style="padding: 9px;">{!! $user->current_ctc !!} </td></tr>     
				<tr><th style="padding: 9px;">Marital Status</th>	<td style="padding: 9px;">{!! $user->marital_status !!} </td></tr>
			</tbody>
		</table>
		<h3 style="page-break-inside: auto; text-decoration: underline; padding-bottom: 5px; padding-top: 5px;">User Qualification</h3>
		<table class="table" cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th style="padding: 5px;">#</th>
					<th style="padding: 5px;">Degree</th>
					<th style="padding: 5px;">University</th>
					<th style="padding: 5px;">Specialisation</th>
					<th style="padding: 5px;">Achievements</th>
					<th style="padding: 5px;">Passing Year</th>
					<th style="padding: 5px;">Percentage</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user->qualifications as $key => $qualification)
					<tr>
						<td style="padding: 5px;">{!! $key + 1 !!}</td>
						<td style="padding: 5px;">{!! $qualification->degree !!}</td>
						<td style="padding: 5px;">{!! $qualification->university !!}</td>
						<td style="padding: 5px;">{!! $qualification->specialisation !!}</td>
						<td style="padding: 5px;">{!! $qualification->achievements !!}</td>
						<td style="padding: 5px;">{!! $qualification->passing_year !!}</td>
						<td style="padding: 5px;">{!! $qualification->percentage !!}</td>
					</tr>
				@endforeach						 
			</tbody>
		</table>
		<h3 style="page-break-inside: auto; text-decoration: underline; padding-bottom: 5px; padding-top: 5px;">User Experience</h3>
		<table class="table" cellpadding="0" cellspacing="0" border="1">
			<thead>
					<tr>
						<th style="padding: 5px;">#</th>
						<th style="padding: 5px;">Organisation Name</th>
						<th style="padding: 5px;">Designation</th>
						<th style="padding: 5px;">Duration in years</th>
						<th style="padding: 5px;">CTC</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user->experiences as $key => $experience)
					<tr>
						<td style="padding: 5px;">{!! $key + 1 !!}</td>
						<td style="padding: 5px;">{!! $experience->organisation_name !!}</td>
						<td style="padding: 5px;">{!! title_case($experience->designation) !!}</td>
						<td style="padding: 5px;">{!! $experience->duration_in_years !!}</td>
						<td style="padding: 5px;">{!! $experience->ctc !!}</td>
					</tr>
					@endforeach
				</tbody>
		</table>
		<h3 style="page-break-inside: auto; text-decoration: underline; padding-bottom: 5px; padding-top: 5px;">User Reference</h3>
		<table class="table" cellpadding="0" cellspacing="0" border="1">
			<thead>
					<tr>
						<th style="padding: 5px;">#</th>
						<th style="padding: 5px;">Name</th>
						<th style="padding: 5px;">Designation</th>
						<th style="padding: 5px;">Organization</th>
						<th style="padding: 5px;">Email</th>
						<th style="padding: 5px;">Contact</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user->references as $key => $reference)
					<tr>
						<td style="padding: 5px;">{!! $key + 1 !!}</td>
						<td style="padding: 5px;">{!! $reference->name !!}</td>
						<td style="padding: 5px;">{!! $reference->designation !!}</td>
						<td style="padding: 5px;">{!! $reference->organisation !!}</td>
						<td style="padding: 5px;">{!! $reference->email !!}</td>
						<td style="padding: 5px;">{!! $reference->contact !!}</td>
					</tr>
					@endforeach
				</tbody>
		</table>
		<h3 style="page-break-inside: auto; text-decoration: underline; padding-bottom: 5px; padding-top: 5px;">Test Result - {!! App\Test::where('user_id','=',$user->id)->where('correct', true)->count(); !!} / {!! App\Test::where('user_id','=',$user->id)->count(); !!}</h3>
		<table class="table" cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th style="padding: 5px;">#</th>
					<th style="padding: 5px;">Question</th>
					<th style="padding: 5px;">True / False</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user->tests as $key => $test)
					<tr>
						<td style="padding: 5px;">{!! $key + 1 !!}</td>
						<td style="padding: 5px;">{!! $test->question->question !!}</td>
						<td style="padding: 5px;">{!! $test->correct ? 'True' : 'False' !!}</td>
					</tr>
				@endforeach						 
			</tbody>
		</table>
  </div>

  </body>
</html>
