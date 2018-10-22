@extends('admin.layouts.panel')
@section('title','Generate IDs')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Generate Auto IDs</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('departments.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("post.generate") )->method('post')->class('p-t-15')->role('form')->id('form') !!}
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Enter Number</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="number" name="number" placeholder="Enter Number" required="">
				@if($errors->has('number'))<p class="help-block">{!! $errors->first('number') !!}</p>@endif
			</div>
		</div>    
		<div class="form-group department-menu row">
			<label class="col-sm-12 col-md-2 col-form-label">Department</label>
			<div class="col-sm-12 col-md-10">
				<select class="form-control selectpicker" name="department_id" style="margin-left: 16px;">
					@foreach(App\Department::all() as $department)
					<option value="{!! $department->id !!}">{!! $department->name !!}</option>
					@endforeach
				</select>
				<br><br>
				@if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
			</div>
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