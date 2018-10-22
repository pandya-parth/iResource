@extends('admin.layouts.panel')
@section('title','Qualifications')
@section('content')
<div class="min-height-200px">

	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Qualification Detail</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('user.qualifications.create', Auth::user()->id) !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Qualifications</a>
			</div>
		</div>
		<div class="table-responsive">
			@if($qualifications->count() > 0)
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Degree</th>
						<th scope="col">University</th>
						<th scope="col">Specialisation</th>
						<th scope="col">Achievements</th>
						<th scope="col">Passing Year</th>
						<th scope="col">Percentage</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($qualifications as $key => $qualification)
						<tr>
							<th>{!! $key + 1 !!}</th>
							<td>{!! $qualification->degree !!}</td>
							<td>{!! $qualification->university !!}</td>
							<td>{!! $qualification->specialisation !!}</td>
							<td>{!! $qualification->achievements !!}</td>
							<td>{!! $qualification->passing_year !!}</td>
							<td>{!! $qualification->percentage !!}</td>
							<td>
								<a href="{!!route('user.qualifications.show',['user_id'=> Auth::user()->id,'id'=>$qualification->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
								<a href="{!!route('user.qualifications.edit',['user_id'=> Auth::user()->id,'id'=>$qualification->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{!!route('user.qualifications.destroy',['user_id'=> Auth::user()->id,'id'=>$qualification->id])!!}" class="btn btn-sm btn-danger"  data-confirm="Are you sure want to delete?" ><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach						 
				</tbody>
			</table>
			@else
				<P>No qualifications found</P>
			@endif
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection