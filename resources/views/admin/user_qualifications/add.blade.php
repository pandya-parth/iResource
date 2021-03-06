@extends('admin.layouts.panel')
@section('title','Add Qualifications')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Add Qualifications</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('user.qualifications.index', Auth::user()->id) !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("user.qualifications.store", Auth::user()->id) )->method('post')->class('p-t-15  ')->role('form')->id('form') !!}
		{{ csrf_field() }}
		<div class="form-group">
			<label>Degree</label>
			<input class="form-control" type="text" name="degree" value="{!! old('degree') !!}" placeholder="Degree" value="{!! old('degree') !!}">
			@if($errors->has('degree'))<p class="help-block">{!! $errors->first('degree') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>University</label>
			<input class="form-control" type="text" name="university" value="{!! old('university') !!}" placeholder="University"  value="{!! old('university') !!}">
			@if($errors->has('university'))<p class="help-block">{!! $errors->first('university') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Specialisation</label>
			<input class="form-control" type="text" name="specialisation" value="{!! old('specialisation') !!}" placeholder="Specialisation">
			@if($errors->has('specialisation'))<p class="help-block">{!! $errors->first('specialisation') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Achievements</label>
			<input class="form-control" type="text" name="achievements" value="{!! old('achievements') !!}" placeholder="Achievements">
			@if($errors->has('achievements'))<p class="help-block">{!! $errors->first('achievements') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Passing Year</label>
			<input class="form-control" type="number" name="passing_year" min="0" value="{!! old('passing_year') !!}" placeholder="Passing Year">
			@if($errors->has('passing_year'))<p class="help-block">{!! $errors->first('passing_year') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Percentage</label>
			<input class="form-control" type="number" name="percentage" min="0" value="{!! old('percentage') !!}" placeholder="Percentage">
			@if($errors->has('percentage'))<p class="help-block">{!! $errors->first('percentage') !!}</p>@endif
		</div>
		{!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
		{!! Former::close() !!}
	</div>
	<!-- Default Basic Forms End -->
</div>
@endsection