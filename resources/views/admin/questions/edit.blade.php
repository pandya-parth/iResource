@extends('admin.layouts.panel')
@section('title','Edit Question')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Edit Question</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('questions.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("questions.update", $question->id) )->method('patch')->class('p-t-15  ')->role('form')->id('form') !!}
		<div class="form-group">
			<label>Department</label>
			<select class="form-control selectpicker" name="department_id" style="margin-left: 16px;">
				@foreach(App\Department::all() as $department)
				<option value="{!! $department->id !!}" {!! $question->department_id == $department->id ? 'selected' : '' !!}>{!! $department->name !!}</option>
				@endforeach
			</select>
			<br><br>
			<a class="btn btn-info btn-sm" href="{!! route('departments.create') !!}">Add New Department</a>
			@if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Question</label>
			<textarea name="question" placeholder="Question" class="form-control">{!! $question->question !!}</textarea>
			@if($errors->has('question'))<p class="help-block">{!! $errors->first('question') !!}</p>@endif
		</div>  
		<div class="form-group">
			<label>Option A</label>
			<textarea name="a" placeholder="Option A" class="form-control">{!! $question->a !!}</textarea>
			@if($errors->has('a'))<p class="help-block">{!! $errors->first('a') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Option B</label>
			<textarea name="b" placeholder="Option B" class="form-control">{!! $question->b !!}</textarea>
			@if($errors->has('b'))<p class="help-block">{!! $errors->first('b') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Option C</label>
			<textarea name="c" placeholder="Option C" class="form-control">{!! $question->c !!}</textarea>
			@if($errors->has('c'))<p class="help-block">{!! $errors->first('c') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Option D</label>
			<textarea name="d" placeholder="Option D" class="form-control">{!! $question->d !!}</textarea>
			@if($errors->has('d'))<p class="help-block">{!! $errors->first('d') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Option D</label>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="option_a" name="answer" value="a" class="custom-control-input" {!! $question->answer == 'a' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="option_a">Option A</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="option_b" name="answer" value="b" class="custom-control-input" {!! $question->answer == 'b' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="option_b">Option B</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="option_c" name="answer" value="c" class="custom-control-input" {!! $question->answer == 'c' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="option_c">Option C</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="option_d" name="answer" value="d" class="custom-control-input" {!! $question->answer == 'd' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="option_d">Option D</label>
			</div>
		</div>
		<div class="form-group">
			<label>More Info</label>
			<textarea name="more_info" placeholder="Option D" class="form-control">{!! $question->more_info !!}</textarea>
			@if($errors->has('more_info'))<p class="help-block">{!! $errors->first('more_info') !!}</p>@endif
		</div>
		<div class="form-group">
			<div class="custom-control custom-checkbox mb-5">                            
				<input class="form-control" type="hidden" name="status" value="0">
				<input id="activate" class="custom-control-input" type="checkbox" name="status" value="1" {!! $question->status ? 'checked' : ''  !!}>
				<label class="custom-control-label" for="activate">Click here to approve/active this question</label>
			</div>   
		</div>
		{!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
		{!! Former::close() !!}
	</div>
</div>
@endsection