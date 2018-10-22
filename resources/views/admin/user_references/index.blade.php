@extends('admin.layouts.panel')
@section('title','User Reference')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Reference Detail</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('user.references.create', Auth::user()->id) !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Reference</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($user_references) > 0)
			<table class="table table-striped"  id="extras" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Designation</th>
						<th scope="col">Organization</th>
						<th scope="col">Email</th>
						<th scope="col">Contact</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user_references as $key => $reference)
					<tr>
						<th>{!! $key + 1 !!}</th>
						<td>{!! $reference->name !!}</td>
						<td>{!! $reference->designation !!}</td>
						<td>{!! $reference->organisation !!}</td>
						<td>{!! $reference->email !!}</td>
						<td>{!! $reference->contact !!}</td>
						<td>
							<a href="{!!route('user.references.show',['user_id'=> Auth::user()->id,'id'=>$reference->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('user.references.edit',['user_id'=> Auth::user()->id,'id'=>$reference->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('user.references.destroy',['user_id'=> Auth::user()->id,'id'=>$reference->id])!!}" class="btn btn-sm btn-danger"  data-confirm="Are you sure want to delete?" ><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Extras Found.</p>
			@endif
		</div>
	</div>
</div>
@endsection