@extends('admin.layouts.panel')
@section('title','Edit Department')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Edit Department</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('departments.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("departments.update",$department->id) )->method('patch')->class('p-t-15  ')->role('form')->id('form') !!}
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="name" placeholder="Department Name" required="" value="{!! $department->name !!}">
			@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
		</div>
		{!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
		{!! Former::close() !!}
	</div>
</div>
</div>
</div>
</div>
</div>
@endsection