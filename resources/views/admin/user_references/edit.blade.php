@extends('admin.layouts.panel')
@section('title','Edit Reference')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Edit Reference</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('user.references.index', Auth::user()->id) !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("user.references.update", [ 'user_id' => Auth::user()->id, 'id' => $reference->id] ) )->method('patch')->class('p-t-15  ')->role('form')->id('form') !!}
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name" placeholder="Name" required="" value="{!! $reference->name !!}">
			@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Designation</label>
			<input class="form-control" type="text" name="designation" placeholder="Designation" required="" value="{!! $reference->designation !!}">
			@if($errors->has('designation'))<p class="help-block">{!! $errors->first('designation') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Organisation</label>
			<input class="form-control" type="text" name="organisation" placeholder="Organisation" required="" value="{!! $reference->organisation !!}">
			@if($errors->has('organisation'))<p class="help-block">{!! $errors->first('organisation') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" name="email" placeholder="Email" required="" value="{!! $reference->email !!}">
			@if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Contact</label>
			<input class="form-control" type="number" name="contact" min="0" placeholder="Contact" required="" value="{!! $reference->contact !!}">
			@if($errors->has('contact'))<p class="help-block">{!! $errors->first('contact') !!}</p>@endif
		</div>
		{!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
		{!! Former::close() !!}
	</div>
</div>
@endsection