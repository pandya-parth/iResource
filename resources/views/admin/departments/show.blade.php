@extends('admin.layouts.panel')
@section('title','Department Detail')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Department Details</h4>
			</div>	
			<div class="pull-right">
                <a href="{!! route('departments.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
						<tr>
							<th scope="col">Name</th><td>{!! title_case($department->name) !!}</td></tr>
							<tr><th scope="col">Created At</th><td>{!!$department->created_at!!}</td></tr>
							<tr><th scope="col">Updated At</th><td>{!!$department->updated_at!!}</td>
						</tr>
				</tbody>
			</table>
		</div>
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Interviewers of {!! title_case($department->name) !!}</h4>
			</div>
		</div>
		<div class="table-responsive">
						@if(count($department->users) > 0)
						<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Selected or not ?</th>
							</tr>
						</thead>
						

						<tbody>
							@foreach($department->users as $interviewer)
							<tr>		
								<td>{!! title_case($interviewer->name) !!}</td>
								<td>{!! title_case($interviewer->email) !!}</td>
								<td>{!! title_case($interviewer->active ? 'selected' : 'Not selected') !!}</td>
							</tr>
							
							@endforeach
						</tbody>

					</table>
					@else
							<p>No Interviewers Found.</p>
							@endif
				</div>
			</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection