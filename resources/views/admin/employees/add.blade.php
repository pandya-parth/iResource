@extends('admin.layouts.panel')
@section('title','Add Employee')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Add Employee</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('employees.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<form role="form" action="{!! route('employees.store') !!}" role="form" method="post" class="login-form  ">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Department</label>
				<select class="form-control selectpicker" name="department_id" style="margin-left: 16px;">
					@foreach(App\Department::all() as $department)
					<option value="{!! $department->id !!}">{!! $department->name !!}</option>
					@endforeach
				</select>
				<br><br>
				<a class="btn btn-info btn-sm" href="{!! route('departments.create') !!}">Add New Department</a>
				@if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
			</div>
			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="name" placeholder="John Doe" value="{!! old('name') !!}">
				@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="text" name="email" placeholder="abc@gmail.com"  value="{!! old('email') !!}">
				@if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="password" name="password" placeholder="*********">
				@if($errors->has('password'))<p class="help-block">{!! $errors->first('password') !!}</p>@endif
			</div>
			<div class="form-group">
				<label>Password Confirmation</label>
				<input class="form-control" type="password" name="password_confirmation" placeholder="*********">
				@if($errors->has('password_confirmation'))<p class="help-block">{!! $errors->first('password_confirmation') !!}</p>@endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-outline-primary">Save!</button>
			</div>
		</form>
	</div>
	<!-- Default Basic Forms End -->
</div>
@endsection