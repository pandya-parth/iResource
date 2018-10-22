@extends('admin.layouts.panel')
@section('title','Edit Employee')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Edit Employee</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('employees.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("employees.update",$user->id) )->method('PATCH')->class('p-t-15  ')->role('form')->id('form')->files('true') !!}
		{{ csrf_field() }}
		
		<div class="form-group">
			<label>Department</label>
			<select class="form-control selectpicker" name="department_id" style="margin-left: 16px;">
				<option value="">Select Department</option>
				@foreach(App\Department::all() as $department)
				<option value="{!! $department->id !!}" {!! $department->id == $user->department_id ? 'selected' : '' !!}>{!! $department->name !!}</option>
				@endforeach
			</select>
			@if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" value="{!! $user->name !!}" name="name" placeholder="John Doe">
			@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" value="{!! $user->email !!}" name="email" placeholder="abc@gmail.com">
			@if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
		</div> 
		<div class="form-group">
			<button type="submit" class="btn btn-outline-primary">Save!</button>
		</div>
		{!! Former::close() !!}
	</div>
	<!-- Default Basic Forms End -->
</div>
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{!! asset('js/ckfinder.js') !!}"></script>
<script>
	$(document).ready(function() {

		var uploader = new plupload.Uploader({
			runtimes : 'html5,flash,silverlight,html4',

			browse_button : 'pickfiles',
			container: document.getElementById('container'),

			url : "{{ asset('plupload/upload.php') }}",

			multi_selection : false,

			    filters : {
				        max_file_size : '10mb'
			    },


			flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",


			silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",

			init: {
				PostInit: function() {
					document.getElementById('filelist').innerHTML = '';
				},

				FilesAdded: function(up, files) {
					uploader.start();
					jQuery('.loader').fadeToggle('medium');
				},

				UploadComplete: function(up, files){
					var tmp_url = '{!! asset('/tmp/') !!}';
					plupload.each(files, function(file) {
						$('#photo').val(file.name);
						$('#preview').val(file.name);
						$('#previewDiv >img').remove();
						$('#previewDiv').append("<p>"+file.name+"</p>");
					});
					jQuery('.loader').fadeToggle('medium');
				},

				Error: function(up, err) {
					alert(err.message);
				}
			}
		});

		uploader.init();


		var editor = CKEDITOR.replace( 'res_address',{
			allowedContent:true,
		});
		CKFinder.setupCKEditor( editor );

		var editor1 = CKEDITOR.replace( 'per_address',{
			allowedContent:true,
		});
		CKFinder.setupCKEditor( editor1 );
	});
</script>
@endsection