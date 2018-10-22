@extends('admin.layouts.panel')
@section('title','Add Experience')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Add Experience</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('user.experiences.index', Auth::user()->id) !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("user.experiences.store", Auth::user()->id ) )->method('post')->class('p-t-15  ')->role('form')->id('form') !!}
		<div class="form-group">
			<label>Organisation Name</label>
			<input class="form-control" type="text" name="organisation_name" value="{!! old('organisation_name') !!}" placeholder="Organisation Name" required="">
			@if($errors->has('organisation_name'))<p class="help-block">{!! $errors->first('organisation_name') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Designation</label>
			<input class="form-control" type="text" name="designation" value="{!! old('designation') !!}" placeholder="Designation" required="">
			@if($errors->has('designation'))<p class="help-block">{!! $errors->first('designation') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Duration in Years</label>
			<input class="form-control" type="number" name="duration_in_years" min="1" value="{!! old('duration_in_years') !!}" placeholder="Duration in Years" required="">
			@if($errors->has('duration_in_years'))<p class="help-block">{!! $errors->first('duration_in_years') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>CTC</label>
			<input class="form-control" type="number" name="ctc" value="{!! old('ctc') !!}" min="1" placeholder="CTC" required="">
			@if($errors->has('ctc'))<p class="help-block">{!! $errors->first('ctc') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Reason for leaving</label>
			<textarea name="reason_for_leaving" value="{!! old('reason_for_leaving') !!}" placeholder="Reason for leaving"></textarea>
			@if($errors->has('reason_for_leaving'))<p class="help-block">{!! $errors->first('reason_for_leaving') !!}</p>@endif
		</div>
		{!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
		{!! Former::close() !!}
	</div>
</div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
	var options = {
		filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
		allowedContent:true
	};
	$(document).ready(function() {
		var editor = CKEDITOR.replace( 'reason_for_leaving',options);
	});
</script>
@endsection