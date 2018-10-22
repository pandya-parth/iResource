@extends('admin.layouts.panel')
@section('title','Qualifications Detail')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Qualifications Detail</h4>
			</div>	
			<div class="pull-right">
                <a href="{!! route('user.qualifications.index', Auth::user()->id) !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
			<tr><th scope="col">Degree</th>	<td>{!! $qualification->degree !!}</td></tr>
			<tr><th scope="col">University</th>	<td>{!! $qualification->university !!}</td></tr>
			<tr><th scope="col">Specialisation</th>	<td>{!! $qualification->specialisation !!}</td></tr>
			<tr><th scope="col">Achievements</th>	<td>{!! $qualification->achievements !!}</td></tr>
			<tr><th scope="col">Passing Year</th>	<td>{!! $qualification->passing_year !!}</td></tr>
			<tr><th scope="col">Percentage</th>	<td>{!! $qualification->percentage !!}</td></tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection